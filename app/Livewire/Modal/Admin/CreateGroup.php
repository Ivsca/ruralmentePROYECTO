<?php

namespace App\Livewire\Modal\Admin;

use App\Models\Group;
use App\Models\User;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;
use Illuminate\Support\Str;
use Laravel\Jetstream\Rules\Role;
use Spatie\Permission\Models\Permission;
use Stringable;

class CreateGroup extends Component
{
    use WithFileUploads;
    public $openAdmin = false;
    public $photo, $name, $lastName, $sex, $phone,
        $email, $document, $documentType, $birthDate,
        $country, $department, $city, $address, $description, $permiso = [];

    protected $rules = [
        'document'                => 'required|integer|regex:/^[0-9]{7,12}+$/',
        'documentType'        => 'required',
        'name'                        => 'required|string|min:4|max:60|regex:/^[a-zA-Z\s]+$/',
        'lastName'                 => 'required|string|min:4|max:60|regex:/^[a-zA-Z\s]+$/',
        'sex'                            => 'required',
        'birthDate'                 =>  'required|date',
        'phone'                      => 'required|regex:/^[0-9]{7,12}+$/',
        'department'           => 'required|string|min:4|max:60|regex:/^[a-zA-Z\s]+$/',
        'city'                           => 'required|string|min:4|max:60|regex:/^[a-zA-Z\s]+$/',
        'address' => 'required|min:4|max:60',
        'email' => 'required|email',
        'description' => 'required|min:4|max:255 ',
        'photo' => 'required|image|max:1000',
    ];

    public function mount()
    {
        $this->permiso= [];
        
    }

    public function createGroup()
    {
        $this->Validate();

        $customName = null;
        if ($this->photo) {
            $customName = 'Group/' . uniqid() . '.' . $this->photo->extension();
            $this->photo->storeAs('public/', $customName);
        }



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
        ])->assignRole('Admin');
        
        $user->syncPermissions($this->permiso);

        Group::create([
            'photo' => $customName, // Almacena la imagen en formato Base64
            'description' => $this->description,
            'id_user' => $user->id,
        ]);
        $sendEmail = strtoupper($this->name[0].$this->lastName[0].$this->document);

        $this->openAdmin = false;
        $this->reset('document', 'documentType', 'name', 'lastName', 'sex', 'birthDate', 'phone', 'department', 'city', 'address', 'email','photo', 'description');
        $this->dispatch('render');
    }

    public function resetPreview()
    {
        $this->photo = null;
    }

    public function edit(User $user)
    {
        return $user;
    }
    public function store()
    {

    }

    public function render()
    {
        $permisos = Permission::all();
        return view('livewire.modal.admin.create-group', compact('permisos'));
    }
}
