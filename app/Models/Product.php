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
        "colores",      // keep original DB field if you already have it
        "category",
        "status",
    ];

    protected $casts = [
        'colores' => 'array',
    ];

    /**
     * Backwards-compatible accessor so view can use $product->colors
     */
    public function getColorsAttribute()
    {
        // prefer english 'colors' if you have it, otherwise fall back to 'colores'
        if (array_key_exists('colors', $this->attributes)) {
            return $this->attributes['colors'] ? json_decode($this->attributes['colors'], true) : [];
        }

        return $this->colores ?? [];
    }

    public function invoices(): BelongsToMany
    {
        return $this->belongsToMany(Invoice::class, 'invoice_products', 'id_invoice', 'id_product')
            ->withPivot('date','subTotal','total')
            ->withTimestamps();
    }
}
