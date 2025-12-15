<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TablaCarrito extends Model
{
    protected $table = 'tablacarrito';

    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $keyType = 'int';

    public $timestamps = true;

    protected $fillable = [
        'id_user',
        'productosYcantidad_ids',
        'CantidadProductos',
    ];

    protected $casts = [
        'productosYcantidad_ids' => 'array', // Eloquent convierte JSON <-> array automáticamente
    ];
}
