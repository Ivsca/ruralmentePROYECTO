<?php

namespace App\Livewire\Tourism;

use App\Models\Workshop;
use Livewire\Component;

class CardWorkPractic extends Component
{
    public $seeButton = 1;
    public $register;

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

    public function render()
    {
        $workshopCouses = Workshop::where('eventType','=','Talleres')->get();
        return view('livewire.tourism.card-work-practic', compact('workshopCouses'));
    }
}
