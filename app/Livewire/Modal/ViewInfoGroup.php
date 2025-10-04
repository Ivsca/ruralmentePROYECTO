<?php

namespace App\Livewire\Modal;

use App\Models\Group;
use Livewire\Component;

class ViewInfoGroup extends Component
{
    public $groupId, $group;
    public $openInfoGroup = false;

    public function mount()
    {
        $this->group = Group::find($this->groupId);
    }

    public function render()
    {
        return view('livewire.modal.view-info-group');
    }
}
