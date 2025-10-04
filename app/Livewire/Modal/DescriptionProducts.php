<?php

namespace App\Livewire\Modal;

use App\Models\Product;
use Livewire\Component;

class DescriptionProducts extends Component
{
    public $open = false;
    public $rating = 0;
    public $seeButton = 1;
    public $register, $quantity;
    protected $listeners = ['register' => 'openRegister', 'closeRegister'];

    //abrir el modal depende del producto
    public $productId, $product;

    public function setRating($rating)
    {
        $this->rating = $rating;
    }
    public function mount()
    {
        $this->seeButton = 1;

        $this->product = Product::find($this->productId);
    }

    public function openRegister()
    {
        $this->register = true;
    }

    public function closeRegister()
    {
        $this->register = false;
    }
    public function render()
    {
        return view('livewire.modal.description-products');
    }
}
