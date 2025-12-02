<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "title",
        "description",
        "contentProductDescription",
        "price",
        "stock",
        "photo",
        "photo_public_id",
        "color",
        "category",
        "status",
    ];


    public function invoices():BelongsToMany
    {
        return $this->belongsToMany(Invoice::class, 'invoice_products', 'id_invoice', 'id_product')
        ->withPivot('date','subTotal','total')
        ->withTimestamps();
    }

}
