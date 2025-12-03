<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CarritoCompras extends Model
{
    protected $table = 'carritocompras';

    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $keyType = 'int';

    public $timestamps = true;

    protected $fillable = [
        'id_user',
        'productos_ids',
        'CantidadProductos',
        'seleccionado',
    ];

    // Para tratarlo directamente como boolean
    protected $casts = [
        'seleccionado' => 'boolean',
    ];
}
