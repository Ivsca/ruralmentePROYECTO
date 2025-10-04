<?php

namespace App\Livewire\Modal\Admin;

use App\Models\Membership;
use Livewire\Component;

class CreatePlan extends Component
{
    public $openCreatePlan = false, $cantidadInputs = 1;
    public $name, $producers, $platform, $fieldDay, $choiceType, $price, $quantitySession, $telepsychologies;
    
    
    public function createPlan()
    {
        $this->validate([
            'name' => 'required|string',
            'producers' => 'required|integer',//cantidad de productores
            'platform' => 'required',//acceso a la platforma almacigo BOOL
            'fieldDay' => 'required',
            'telepsychologies' => 'required',
            'quantitySession' => 'required|integer',
        ]);
        
        Membership::create([
            'name' => $this->name,
            'producers' => $this->producers,
            'platform' => $this->platform,
            'fieldDay' => $this->fieldDay,
            'choiceType' => $this->choiceType,
            'quantitySession' => $this->quantitySession,
            'telepsychologies' => $this->telepsychologies,
        ]);
        $this->openCreatePlan = false;
        $this->dispatch('render');
    }


    public function render()
    {
        
        return view('livewire.modal.admin.create-plan',);
    }
}
