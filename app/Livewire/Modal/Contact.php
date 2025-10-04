<?php

namespace App\Livewire\Modal;

use Livewire\Component;

class Contact extends Component
{
    public $openContact = false;
    public $email, $coment, $name;

    public function render()
    {
        return view('livewire.modal.contact');
    }
}
