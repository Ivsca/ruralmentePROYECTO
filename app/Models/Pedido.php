<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $table = 'pedidos';

    protected $fillable = [
        'user_id',
        'estado',
        'moneda',
        'subtotal_centavos',
        'envio_centavos',
        'total_centavos',
        'cliente_nombre',
        'cliente_email',
        'cliente_telefono',
        'direccion_envio',
        'notas',
        'mp_preference_id',
        'mp_payment_id',
        'mp_status',
        'external_reference',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function items()
    {
        return $this->hasMany(PedidoItem::class);
    }

    public function getTotalAttribute()
    {
        return $this->total_centavos / 100;
    }

    public function getSubtotalAttribute()
    {
        return $this->subtotal_centavos / 100;
    }
}
