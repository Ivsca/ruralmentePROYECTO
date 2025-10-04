<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable= [
        'date',
        'subtotal',
        'total',
        'id_user'
    ];

    public function products():BelongsToMany
    {
        return $this->belongsToMany(Product::class, 'invoice_products', 'id_invoice', 'id_product')
        ->withPivot('date','subTotal','total', 'quantity', 'wayToPay')
        ->withTimestamps();
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
