<?php

namespace App\Livewire\Admin;

use App\Models\Product;
use Livewire\Attributes\On;
use Livewire\Component;

class ProductAdmin extends Component
{
    public $name, $title, $description, $quantity, $price, $photo, $status, $contentProductDescription;
    public $openDelete,$openEdit, $productId, $product;
    
    public function __contruct()
    {
        $this->middleware('can:admin.product')->only('render');
        $this->middleware('can:admin.product.edit')->only('editConfirm');
        $this->middleware('can:admin.product.destroy')->only('confirmDelete');
    }
    
    public function editConfirm($productId)
    {
        $this->openEdit = true;
        $getProduct = $this->product = Product::find($productId);

        $this->name = $getProduct->name;
        $this->title = $getProduct->title;
        $this->description = $getProduct->description;
        $this->contentProductDescription = $getProduct->contentProductDescription;
        $this->quantity = $getProduct->stock;
        $this->price = $getProduct->price;
        $this->photo = $getProduct->photo;
        $this->status = $getProduct->status;
    }

    public function editConfirmed()
    {
        if ($this->product) {
            $validate = $this->Validate([
                "name" => "required|min:4|max:255",
                "title" => "required|min:4|max:100",
                "description" => "required|min:4|max:255",
                "contentProductDescription" => "required|min:4|max:255",
                "price" => "required|min:2|max:20",
                "quantity" => "required",
                'status' => 'required',
            ]);
            $this->product->update($validate);
        }
        $this->openEdit = false;
    }


    public function confirmDelete($productId)
    {
        $this->product = Product::find($productId);
        $this->openDelete = true; // Abre el modal de confirmación
    }

    public function deleteConfirmed()
    {
        if ($this->product) {
            $this->product->delete();
            $this->dispatch('alert', '¡Producto Eliminado!');
        }
        $this->openDelete = false; // Cierra el modal de confirmación
    }



    #[On('render')]
    public function render()
    {
        $products= Product::all();
        return view('livewire.admin.product-admin', compact('products'));
    }
}
