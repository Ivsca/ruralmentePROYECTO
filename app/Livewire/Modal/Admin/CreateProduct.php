<?php

namespace App\Livewire\Modal\Admin;

use App\Models\CategoryProduct;
use App\Models\Product as ModelsProduct;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class CreateProduct extends Component
{
    use WithFileUploads;
    public $openProduct = false;
    public $photo, $name, $title, $description, $contentProductDescription, $price, $stock, $color, $categoryProduct, $status;

    public function mount()
    {
        $this->photo = null;
        $this->name = null;
        $this->title = null;
        $this->description = null;
        $this->contentProductDescription = null;
        $this->price = null;
        $this->stock = null;
        $this->color = null;
        $this->categoryProduct = null;
        $this->status = null;
    }

    public function createProduct()
    {
        $this->Validate([
            "photo" => "required|image|max:1000",
            "name" => "required|min:4|max:255",
            "title" => "required|min:4|max:100",
            "description" => "required|min:4|max:255",
            "contentProductDescription" => "required|min:4|max:255",
            "price" => "required|min:2|max:20",
            "stock" => "required",
            "categoryProduct" => "required",
        ]);
        $customName = null;
        if ($this->photo) {
            $customName = 'products/' . uniqid() . '.' . $this->photo->extension();
            $this->photo->storeAs('public/', $customName);
        }
        $separedBylist = explode("\n", $this->contentProductDescription);   

        ModelsProduct::create([
            'photo' => $customName, // Almacena la imagen en formato Base64
            'name'  => $this->name,
            'title' => $this->title,
            'description'  => $this->description,
            'contentProductDescription'  => $this->contentProductDescription,
            'stock' => $this->stock,
            'price'  => $this->price,
            'color' => $this->color,
            'status' => 'Disponible',
            'categoryProduct' => $this->categoryProduct,
        ]);




        $this->openProduct = false;
        $this->reset(['photo', 'name', 'title', 'description', 'contentProductDescription', 'price', 'stock', 'color', 'categoryProduct', 'status']);
        $this->dispatch('render');

        session()->flash('msg', 'El producto a sido creado correctamente');
    }
    public function render()
    {
        return view('livewire.modal.admin.create-product');
    }

    public function resetPreview()
    {
        $this->photo = null;
    }
}
