<?php

namespace App\Livewire;

use App\Models\User;
use App\Models\Workshop;
use Livewire\Attributes\On;
use Livewire\Component;

class TourismPage extends Component
{

    #[On('render')]
    public function render()
    {
        $workshops = Workshop::all();
        return view('livewire.tourism-page', compact('workshops'));
    }
}
   