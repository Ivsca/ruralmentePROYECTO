<?php

namespace App\Livewire\Modal\Admin;

use App\Models\Workshop;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class CreateTaller extends Component
{
    use WithFileUploads;
    public $openTaller = false;
    public $eventType,
        $categoryEvent,
        $name,
        $title,
        $photo,
        $description,
        $participant,
        $duration,
        $location,
        $color,
        $price  ;

    public function mount()
    {
        $this->photo = null;
        $this->name = null;
        $this->title = null;
        $this->description = null;
        $this->participant = 7;
        $this->duration = null;
        $this->location = null;
        $this->eventType = null;
        $this->categoryEvent = null;
        $this->price = null;
        $this->color = null;
    }

    protected $rules = [
        "photo" => "required|image|max:1000",
        "name" => "required|min:4|max:255",
        "title" => "required|min:4|max:100",
        "description" => "required|min:4|max:255",
        "price" => "required|min:2|max:20",
        "participant" => "required",
        "duration" => "required",
        "location" => "required",
        "eventType" => "required",
        // "categoryEvent" => "required",
        "color" => "required",
    ];

    public function updateParticipant($value)
    {
        $this->participant = $value;
    }

    public function createWorkshop()
    {
        $this->Validate();

        //envia las imagenes a la carpeta requerida
        $customName = null;
        if ($this->photo) {
            $customName = 'workshop/' . uniqid() . '.' . $this->photo->extension();
            $this->photo->storeAs('public/', $customName);
        }


        Workshop::create(
            [
                'name' => $this->name,
                'title' => $this->title,
                'description' => $this->description,
                'participant' => $this->participant,
                'duration' => $this->duration,
                'location' => $this->location,
                'price' => $this->price,
                'eventType' => $this->eventType,
                'categoryEvent' => $this->categoryEvent,
                'color' => $this->color,
                'photo' => $customName,
            ]
        );

        $this->openTaller = false;
        $this->reset([
            'photo',
            'name',
            'title',
            'description',
            'participant',
            'duration',
            'location',
            'price',
            'eventType',
            'categoryEvent',
            'color'
        ]);
        $this->dispatch('render');
    }
    public function resetPreview()
    {
        $this->photo = null;
    }

    public function render()
    {
        return view('livewire.modal.admin.create-taller');
    }
}
