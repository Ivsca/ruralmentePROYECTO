<?php

namespace App\Livewire\Modal;

use Livewire\Component;

class ModalLogin extends Component
{
    public $open = false;
    public $seeButton;

    public function mount($seeButton)
    {
        $this->seeButton = $seeButton;
    }

    public function openModal()
    {
        $this->open = true;
    }
    public function openRegister()
    {
        $this->dispatch('register');
    }

    public function render()
    {
        return view('livewire.modal.modal-login');
    }

}
