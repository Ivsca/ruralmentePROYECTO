<?php

namespace App\Livewire\Modal\Admin;

use App\Models\Category;
use Livewire\Attributes\On;
use Livewire\Component;

class CreateCategory extends Component
{
    public $categoryPlan = false, $name;

    public function mount()
    {
        $this->name = null;
    }
    public function createCategory()
    {
        $this->Validate([
            'name' => 'required|String|'
        ]);
        Category::create([
            'name'=> $this->name
        ]);
        $this->categoryPlan = false;
        $this->reset(['name']);
        $this->dispatch('render');
    }
    #[On('render')]
    public function render()
    {
        return view('livewire.modal.admin.create-category');
    }
}
