<?php

namespace App\Livewire;

use App\Models\Invoice;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Date;
use Livewire\Component;

class CarProducts extends Component
{
    public $seeButton = 1;
    public $register;
    public $cartProductiD, $id_usu, $subTotal, $total;

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

    public function addCart()
    {
        $userID = User::find($this->id_usu);
        $dateNow = Date::now()->toLocal();

        Invoice::created([
            'date'=> $dateNow,
            'subtotal'=> $this->subTotal,
            'total'=> $this->total,
            'id_user' => $userID->id
        ]);
    }


    public function render()
    {
        // $getMyProducts = Product::all()->paginate(10);
        return view('livewire.car-products');
    }
}
