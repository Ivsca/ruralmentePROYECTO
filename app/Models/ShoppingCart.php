<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShoppingCart extends Model
{
    use HasFactory;

    protected $table = 'shopping_cart';

    protected $fillable = [
        'idUser',
        'idProduct', // ahora contiene un JSON (array de items)
        'quantity',  // opcional: si quieres mantener un quantity global
    ];

    // Cast idProduct (JSON) a array automáticamente
    protected $casts = [
        'idProduct' => 'array',
    ];

    // Relaciones
    public function user()
    {
        return $this->belongsTo(User::class, 'idUser');
    }

    // Nota: ya no hay relación directa product() porque idProduct es un JSON con varios productos.
    // Helpers para manipular el JSON de productos (cada item: ['product_id' => X, 'quantity' => Y])

    /**
     * Get items (array) stored in idProduct.
     */
    public function getItems(): array
    {
        return $this->idProduct ?? [];
    }

    /**
     * Add a product (or increment quantity if exists).
     */
    public function addProduct(int $productId, int $quantity = 1): void
    {
        $items = $this->getItems();

        foreach ($items as &$item) {
            if ($item['product_id'] === $productId) {
                $item['quantity'] = ($item['quantity'] ?? 0) + $quantity;
                $this->idProduct = $items;
                $this->save();
                return;
            }
        }
        unset($item);

        $items[] = [
            'product_id' => $productId,
            'quantity'   => $quantity,
        ];

        $this->idProduct = $items;
        $this->save();
    }

    /**
     * Update quantity for a product (replace).
     */
    public function updateProductQuantity(int $productId, int $quantity): void
    {
        $items = $this->getItems();
        foreach ($items as &$item) {
            if ($item['product_id'] === $productId) {
                if ($quantity <= 0) {
                    // remove item
                    $this->removeProduct($productId);
                    return;
                }
                $item['quantity'] = $quantity;
                $this->idProduct = $items;
                $this->save();
                return;
            }
        }
        unset($item);
    }

    /**
     * Remove a product from the cart.
     */
    public function removeProduct(int $productId): void
    {
        $items = $this->getItems();
        $items = array_filter($items, fn($i) => $i['product_id'] !== $productId);
        // Reindex array
        $items = array_values($items);
        $this->idProduct = $items;
        $this->save();
    }
}
