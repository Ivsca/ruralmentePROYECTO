<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PedidoItem extends Model
{
    protected $table = 'pedido_items';

    protected $fillable = [
        'pedido_id',
        'product_id',
        'color',
        'talla',
        'cantidad',
        'precio_unitario_centavos',
        'total_linea_centavos',
    ];

    public function pedido()
    {
        return $this->belongsTo(Pedido::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function getPrecioUnitarioAttribute()
    {
        return $this->precio_unitario_centavos / 100;
    }

    public function getTotalLineaAttribute()
    {
        return $this->total_linea_centavos / 100;
    }
}
