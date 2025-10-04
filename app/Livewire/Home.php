<?php

namespace App\Livewire;

use Livewire\Component;

class Home extends Component
{
    public $register = false;
    public $seeButton;

    protected $listeners = ['register' => 'openRegister', 'closeRegister'];

    public function mount()
    {
        $this->seeButton = 2;
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
        return view('livewire.home');
    }
}
