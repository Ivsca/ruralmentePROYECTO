<?php

namespace App\Livewire\Modal\Tourism;

use App\Models\Workshop;
use Livewire\Component;

class AgroInfo extends Component
{
    public $seeButton = 1;
    public $openInfoAgro = false;
    public $workshopId, $workshop, $register;

    public function mount()
    {
        $this->seeButton = 1;
        $this->workshop = Workshop::find($this->workshopId);
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
        return view('livewire.modal.tourism.agro-info');
    }
}
