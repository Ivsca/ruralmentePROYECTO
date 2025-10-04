<?php

namespace App\Livewire;

use App\Models\Product;
use App\Models\User;
use League\CommonMark\Node\Block\Document;
use Livewire\Attributes\On;
use Livewire\Component;

class SystemPago extends Component
{
    public $name, $lastName, $document, $documentType, $email, $country, $department, $city, $address, $quantityPay, $price;
    
    public function increment($id)
    {
        $product = Product::find($id);
        $product->quantity + 1;
    }

    public function decrement($id)
    {
        $product = Product::find($id);
        $product->quantity - 1;
    }

    public function calculatePrice($quantity)
    {
        return $quantity * 10;
    }

    public function mount()
    {
        $user = auth()->user();
        $this->name = $user->name;
        $this->lastName = $user->lastName;
        $this->document = $user->document;
        $this->documentType = $user->documentType;
        $this->email = $user->email;
        $this->country = $user->country;
        $this->department = $user->department;
        $this->city = $user->city;
        $this->address = $user->address;
        $this->dispatch('render');
    }

    #[On('render')]
    public function render($id)
    {
        $user = auth()->user();
        $product = Product::find($id);
        return view('livewire.system-pago', ['product' => $product, 'user' => $user]);
    }
}
