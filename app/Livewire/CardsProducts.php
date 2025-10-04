<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Attributes\On;
use Livewire\Component;

class CardsProducts extends Component
{
    public $register = false;
    public $seeButton;
    protected $listeners = ['register' => 'openRegister', 'closeRegister'];



    public function mount()
    {
        $this->seeButton = 1;
        
    }

    public function openRegister()
    {
        $this->register = true;
    }

    public function closeRegister()
    {
        $this->register = false;
    }
    #[On('render')]

    public function render()
    {
        $products = Product::all();
        return view('livewire.cards-products', compact('products'));
    }
}
