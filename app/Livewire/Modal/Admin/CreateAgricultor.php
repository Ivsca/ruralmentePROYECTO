<?php

namespace App\Livewire\Modal\Admin;

use App\Models\Alma;
use App\Models\Category;
use App\Models\Membership;
use App\Models\Subscription;
use App\Models\User;
use Livewire\Component;

class CreateAgricultor extends Component
{
    public $openPlan = false;
    //datos de la tabla usuario
    public $name,
        $lastName,
        $sex,
        $documentType,
        $document,
        $birthDate,
        $phone,
        $country,
        $city,
        $department,
        $address,
        $email;
    //datos de la tabla almas

    public $civilStatus,
        $scholarship,
        $occupation,
        $corregimiento,
        $zoneType,
        $distibution,
        $stratum, $id_category;
    //dato de la tabla subscriptions
    public $renewal, $id_membership, $quantity;

    
    protected $rules= [
        'name'=> 'required|string',
        'lastName'=> 'required|string',
        'sex'=> 'required',
        'documentType'=> 'required',
        'document'=> 'required|integer',
        'birthDate'=> 'required|date',
        'phone'=> 'required|integer',
        'country'=> 'required|string',
        'city'=> 'required|string',
        'department'=> 'required|string',
        'address'=> 'required|string',
        'email'=> 'required|email',
        'civilStatus'=> 'required',
        'scholarship'=> 'required',
        'occupation'=> 'required|string',
        'corregimiento'=> 'required|string',
        'zoneType'=> 'required',
        'distibution'=> 'required',
        'stratum'=> 'required',
        'id_category'=> 'required',
        // 'renewal'=> 'required',
        'id_membership'=> 'required',
    ];

    public function createAgricultor()
    {
        $this->validate();

        $sub = Subscription::create([
            'renewal'=> null,
            'id_membership'=> $this->id_membership,
        ]);
        
        $encriptyngPassword = bcrypt(strtoupper($this->name[0].$this->lastName[0].$this->document));
        $user = User::create([
            'document'  => $this->document,
            'documentType'  => $this->documentType,
            'name'  => $this->name,
            'lastName' => $this->lastName,
            'sex'  => $this->sex,
            'birthDate' =>  $this->birthDate,//
            'phone'  => $this->phone,//
            'country' => 'Colombia',
            'department' => $this->department,
            'city' => $this->city,
            'address' => $this->address,
            'email' => $this->email,
            'password' => $encriptyngPassword,
        ])->assignRole('Agricultor');


        

        Alma::create([
            'civilStatus' => $this->civilStatus,
            'scholarship' => $this->scholarship,
            'occupation' => $this->occupation,
            'corregimiento' => $this->corregimiento,
            'zoneType' => $this->zoneType,
            'distribution' => $this->distibution,
            'stratum' => $this->stratum,
            'id_category' => $this->id_category,
            'id_user' => $user->id,
            'id_subscription' => $sub->id,

        ]);
        $this->dispatch('render');
    }

    public function render()
    {
        $planes = Membership::all();
        $categories = Category::all();
        return view('livewire.modal.admin.create-agricultor', compact('categories', 'planes'));
    }
}
