<?php

namespace App\Livewire\Admin;

use App\Models\Category;
use App\Models\Membership;
use Livewire\Attributes\On;
use Livewire\Component;

class Planes extends Component
{
    public $openDeleteCategory, $openEdit, $categoryId, $category;

    public $name, $quantitySession, $producers, $choiceType;

    public function __contruct()
    {
        //este es el constructr que proteje a las rutas y eviten ingresar hasta este espacio
        $this->middleware('can:admin.planes')->only('render');
        $this->middleware('can:admin.planes.edit')->only('confirmedEditPlan');
        $this->middleware('admin.planes.destroy')->only('confirmDeleteCategory');
    }

    public function confirmDeleteCategory($categoryId)
    {
        $this->category = Membership::find($categoryId);
        $this->openDeleteCategory = true;
    }

    public function deletePlan()
    {
        if ($this->category) {
            $this->category->delete();
            $this->dispatch('render', '!Categoria Eliminada¡');
        }
    }

    //editar plan
    public function confirmedEditPlan($categoryId)
    {
        $plan = $this->category = Membership::find($categoryId);
        $this->name = $plan->name;
        $this->quantitySession = $plan->quantitySession;
        $this->producers = $plan->producers;
        $this->choiceType = $plan->choiceType;


        $this->openEdit = true;
    }
    public function confirmedEdit()
    {
        if ($this->category) {
            $val = $this->validate([
                'name' => 'required',
                'quantitySession' => 'required',
                'producers' => 'required',
                'choiceType' => 'nullable',
            ]);
            $this->category->update($val);
            $this->openEdit = false;
            $this->dispatch('render');
        }
    }

    #[On('render')]
    public function render()
    {
        $categoryPlan = Membership::all();
        return view('livewire.admin.planes', compact('categoryPlan'));
    }
}
