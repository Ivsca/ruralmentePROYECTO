<?php

namespace App\Livewire\Admin;

use App\Models\Triaje;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class TriajeAdmin extends Component
{
    use WithPagination;

    // filtros
    public $search = '';
    public $user_id = '';
    public $resultado = '';
    public $date_from = '';
    public $date_to = '';

    // modal / detalle / edición
    public $showDetail = false;
    public $showEdit = false;
    public $showDelete = false;
    public $selectedTriaje;

    protected $listeners = ['confirmDelete', 'deleteConfirmed'];

    protected $rules = [
        'selectedTriaje.observaciones' => 'nullable|string|max:2000',
        'selectedTriaje.resultado' => 'required|string',
        'selectedTriaje.recomendaciones' => 'nullable|string|max:2000',
    ];

    // resetear paginación al cambiar filtro
    public function updatingSearch() { $this->resetPage(); }
    public function updatingUserId() { $this->resetPage(); }
    public function updatingResultado() { $this->resetPage(); }
    public function updatingDateFrom() { $this->resetPage(); }
    public function updatingDateTo() { $this->resetPage(); }

    public function mount()
    {
        $this->resultado = ''; // '', 'bajo','medio','alto'
    }

    public function render()
    {
        $query = Triaje::query()->with('user');

        if ($this->search) {
            $query->where(function($q){
                $q->whereHas('user', fn($q2) => $q2->where('name', 'like', "%{$this->search}%"))
                  ->orWhere('observaciones', 'like', "%{$this->search}%");
            });
        }

        if ($this->user_id) {
            $query->where('user_id', $this->user_id);
        }

        if ($this->resultado) {
            $query->where('resultado', $this->resultado);
        }

        if ($this->date_from) {
            $query->whereDate('created_at', '>=', $this->date_from);
        }
        if ($this->date_to) {
            $query->whereDate('created_at', '<=', $this->date_to);
        }

        $triajes = $query->orderBy('created_at', 'desc')->paginate(10);
        $users = User::orderBy('name')->get();

        // stats
        $total = Triaje::count();
        $bajo = Triaje::where('resultado','bajo')->count();
        $medio = Triaje::where('resultado','medio')->count();
        $alto = Triaje::where('resultado','alto')->count();

        return view('livewire.admin.triaje-admin', compact('triajes','users','total','bajo','medio','alto'));
    }

    /* ---------- acciones UI ---------- */

    public function show($id)
    {
        $this->selectedTriaje = Triaje::with('user')->findOrFail($id);
        $this->showDetail = true;
    }

    public function edit($id)
    {
        $this->selectedTriaje = Triaje::findOrFail($id);
        $this->showEdit = true;
    }

    public function save()
    {
        $this->validate();
        $this->selectedTriaje->save();

        $this->showEdit = false;
        $this->dispatchBrowserEvent('swal:toast', ['icon' => 'success', 'title' => 'Triaje actualizado']);
    }

    public function askDelete($id)
    {
        $this->selectedTriaje = Triaje::findOrFail($id);
        $this->dispatchBrowserEvent('swal:confirm', [
            'title' => '¿Eliminar triaje?',
            'text' => 'Esta acción es irreversible',
            'id' => $id
        ]);
    }

    public function deleteConfirmed($id)
    {
        $triaje = Triaje::find($id);
        if ($triaje) {
            $triaje->delete();
            $this->dispatchBrowserEvent('swal:toast', ['icon' => 'success', 'title' => 'Triaje eliminado']);
        }
    }

    public function exportFiltered()
    {
        // Emitir evento para que el backend genere PDF (ruta)
        $params = http_build_query([
            'search' => $this->search,
            'user_id' => $this->user_id,
            'resultado' => $this->resultado,
            'date_from' => $this->date_from,
            'date_to' => $this->date_to,
        ]);

        return redirect()->to(route('admin.triaje.export') . '?' . $params);
    }
}
