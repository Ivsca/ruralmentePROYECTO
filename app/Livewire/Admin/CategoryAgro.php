<?php

namespace App\Livewire\Admin;

use App\Models\Category;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
use Livewire\Component;

class CategoryAgro extends Component
{

    public $openDeleteCategory,$openUpdateCategory, $categoryId, $category, $name;


    public function __contruct()
    {
        $this->middleware('can:admin.categories')->only('render');
        $this->middleware('can:admin.categories.edit')->only('confirmEditCategory');
        $this->middleware('admin.categories.destroy')->only('confirmDeleteCategory');
    }

    public function confirmDeleteCategory($categoryId)
    {
        $this->category = Category::find($categoryId);
        $this->openDeleteCategory = true; // Abre el modal de confirmación
    }

    public function deleteConfirmed()
    {   
        if ($this->category) {
            $this->category->delete();
            $this->dispatch('alert', '¡Producto Eliminado!');
        }
        $this->openDeleteCategory = false; // Cierra el modal de confirmación
    }
    public function confirmEditCategory($idCategory)
    {
        $category = $this->category = Category::find($idCategory);
        $this->name = $category->name;
        $this->openUpdateCategory =true;  
    }

    public function updateConfirmation()
    {
        if ($this->category){
            $validate = $this->validate([
                'name'=>'required'
            ]);
             $this->category->update($validate);
        }
        $this->openUpdateCategory = false;
    }

    #[On('render')]
    public function render()
    {
        $categoryPlans = Category::all();
        return view('livewire.admin.category-agro', compact('categoryPlans'));
    }
}
