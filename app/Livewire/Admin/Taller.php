<?php

namespace App\Livewire\Admin;

use App\Models\Workshop;
use Livewire\Attributes\On;
use Livewire\Component;

class Taller extends Component
{
    public $workshop, $workshopId, $open, $openEdit;
    public $name, $title, $description, $participant, $duration, $location, $price;

    public function confirmDelete($workshopId)
    {
        $this->workshop = Workshop::find($workshopId);
        $this->open = true; // Abre el modal de confirmación
    }

    public function deleteConfirmed()
    {
        if ($this->workshop) {
            $this->workshop->delete();
            $this->dispatch('alert', '¡Usuario Eliminado!');
        }
        $this->open = false; // Cierra el modal de confirmación
    }

    //editar los talleres que estan en el administrador

    public function editConfirm($id)
    {
        $this->openEdit = true;
        $work = $this->workshop = Workshop::find($id);
        
        $this->name = $work->name;
        $this->title = $work->title;
        $this->description = $work->description;
        $this->participant = $work->participant;
        $this->duration = $work->duration;
        $this->location = $work->location;
        $this->price = $work->price;
    }

    public function confirmedEdit()
    {
        if($this->workshop){
            $verification = $this->validate([
                'name'=>'required|String',
                'title'=>'required|string',
                'description'=>'required|string',
                'participant'=>'required|integer|max:12',
                'duration'=>'required',
                'location'=>'required|string',
                'price'=>'required',
            ]);
            $this->workshop->update($verification);
            $this->openEdit = false;
        }

    }

    #[On('render')]
    public function render()
    {
        $workshops = Workshop::all();
        return view('livewire.admin.taller', compact('workshops'));
    }
}
