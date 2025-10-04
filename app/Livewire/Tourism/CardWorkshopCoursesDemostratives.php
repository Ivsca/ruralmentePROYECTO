<?php

namespace App\Livewire\Tourism;

use App\Models\Workshop;
use Livewire\Attributes\On;
use Livewire\Component;

class CardWorkshopCoursesDemostratives extends Component
{
    #[On('render')]
    public function render()
    {
        $workshopCouses = Workshop::where('eventType','=','Talleres')->get();
        return view('livewire.tourism.card-workshop-courses-demostratives', compact('workshopCouses'));
    }
}
