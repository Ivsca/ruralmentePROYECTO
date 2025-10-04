<?php

namespace App\Livewire\Tourism;

use App\Models\Workshop;
use Livewire\Attributes\On;
use Livewire\Component;

class CardAgrotourism extends Component
{
    public $seeButton = 1;
    public $register;
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
        $workshopAgros = Workshop::where('eventType', '=' , 'Agroturismo')->get();
        return view('livewire.tourism.card-agrotourism', compact('workshopAgros'));
    }
}
