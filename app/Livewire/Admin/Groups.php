<?php

namespace App\Livewire\Admin;

use App\Models\Group;
use App\Models\User;
use Livewire\Attributes\On;
use Livewire\Component;

class Groups extends Component
{
    public $users, $groups;
    public function mount()
    {
        $this->getUsers();
    }
    #[On('render')]
    public function getUsers(){
        $this->groups =Group::with('users')->get(); 
    }
    
    public function render()
    {
        return view('livewire.admin.groups');
    }
}
