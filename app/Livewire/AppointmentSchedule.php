<?php

namespace App\Livewire;

use App\Models\User;
use App\Models\Workshop;
use Illuminate\Queue\Worker;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\Features\SupportConsoleCommands\Commands\Upgrade\ThirdPartyUpgradeNotice;
use Symfony\Contracts\Service\Attribute\Required;

class AppointmentSchedule extends Component
{
    //solo muestra la informacion que has elegido
    public $tourism, $tourismId;

    //este muestra los datos del usuario ya que se va allenar una variable a la final de los usuarios
    public $user,
        $userId,
        $name,
        $lastName,
        $documentType,
        $document,
        $phone,
        $country,
        $department,
        $city,
        $address;
    //datos para la tabla intermedia
    public $dateCitation, $timeCitation, $amountOfPeople, $total, $payMethod, $status, $workshopId;

    public function mount()
    {
        $userInfo = $this->user = auth()->user();
        $this->name = $userInfo->name;
        $this->lastName = $userInfo->lastName;
        $this->documentType = $userInfo->documentType;
        $this->document = $userInfo->document;
        $this->country = $userInfo->country;
        $this->department = $userInfo->department;
        $this->city = $userInfo->city;
        $this->phone = $userInfo->phone;
        $this->address = $userInfo->address;
    }
    public function add(Required $eventId)
    {
        $user_id = $this->user = auth()->user();
        $workshopId = Workshop::find($this->workshopId->id);

        Workshop::find($eventId)->users()->sync([
            'dateCitations' => $this->dateCitation,
            'timeCitations' => $this->timeCitation,
            'amountOfPeople' => $this->amountOfPeople,
            'Total' => $this->total,
            'PayMethod' => $this->PayMethod,
            'status' => $this->status,
            'id_workhop' => $workshopId,
            'id_user' => $user_id->id,
        ]);
        
    }
    public function editInfoUser()
    {
        $validate = $this->validate([
            'phone' => 'required|int',
            'country' => 'required',
            'department' => 'required',
            'city' => 'required',
            'address' => 'required',
        ]);
        $this->user->update($validate);
    }
    #[On('render')]
    public function render($id)
    {
        $user = auth()->user();
        $event = Workshop::find($id);
        if ($event)
        {
            return view('livewire.appointment-schedule',['workshopId' => $event, 'user' => $user]);
        }else{
            dd('error en la visualizacion del producto seleccionado');
        }
    }
}
