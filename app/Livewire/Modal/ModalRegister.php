<?php

namespace App\Livewire\Modal;

use App\Models\User;
use Livewire\Component;

class ModalRegister extends Component
{
    public $documentType, $document, $name, $lastName, $sex, $birthDate,
        $phone, $country, $department, $city, $address, $email, $password;

    protected $rules = [
        'document'      => 'required|integer',
        'documentType'  => 'required',
        'name'          => 'required|string',
        'lastName'      => 'required|string',
        'sex'           => 'required' ,
        'birthDate'     => 'required|date',
        'phone'         => 'required|integer',
        'country'       => 'required',
        'department'    => 'required',
        'city'          => 'required',
        'address'       => 'required|string|regex:/^[a-zA-Z0-9_.-]+$/',
        'email'         => 'required|email|regex:/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+.[a-zA-Z]{2,6}+$/',
        'password'      => 'required',
    ];

    public function createUser()
    {
        $this->validate();

        User::create([
            'document' => $this->document,
            'documentType' => $this->documentType,
            'name' => $this->name,
            'lastName' => $this->lastName,
            'sex' => $this->sex,
            'birthDate' => $this->birthDate,
            'phone' => $this->phone,
            'country' => $this->country,
            'department' => $this->department,
            'city' => $this->city,
            'address' => $this->address,
            'email' => $this->email,
            'password' => bcrypt($this->password),
        ])->assignRole('Client');
        $this->dispatch('closeRegister');
    }   

    public function closeRegister()
    {
        $this->dispatch('closeRegister');
    }

    public function render()
    {
        return view('livewire.modal.modal-register');
    }
}
