<?php

namespace App\Livewire\Admin;

use App\Models\Alma;
use App\Models\Membership;
use App\Models\Subscription;
use Livewire\Attributes\On;
use Livewire\Component;

class Agricultor extends Component
{
    public $Subs, $almas, $user;
    
    public function mount()
    {
        $this->getAgricultor();
    }

    #[On('render')]
    public function getAgricultor()
    {
        // $this->Subs = Subscription::with('membership')->get();
    }
    
    public function render()
    {
        $this->almas = Alma::with('user', 'category', 'subscription')->get();
        
        return view('livewire.admin.agricultor', ['almas' => $this->almas] );
    }
}
