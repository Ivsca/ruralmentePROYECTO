<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Triaje;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\TriajesExport;

class TriajeController extends Controller
{
    
    public function __construct()
    {
        $this->middleware(['auth', 'can:admin.index']);
    }

    
    public function index()
    {
        $triajes = Triaje::paginate(15);
        return view('triaje-admin.index', compact('triajes'));
    }

    
    public function show($id)
    {
        
        $triaje = Triaje::with('user')->findOrFail($id);
        
        
        if (!is_array($triaje->sintomas) && !empty($triaje->sintomas)) {
            $triaje->sintomas = json_decode($triaje->sintomas, true);
        }
        
        return view('servicios.triaje-resultado', compact('triaje'));
    }

    
    public function destroy($id)
    {
        $triaje = Triaje::findOrFail($id);
        $triaje->delete();
        
        return redirect()->route('admin.triajes.index')
            ->with('success', 'Triaje eliminado exitosamente.');
    }

    
    public function export()
    {
        return Excel::download(new TriajesExport, 'triajes_' . date('Y-m-d_H-i-s') . '.xlsx');
    }

    
    public function hojaVida($id)
    {
        $triaje = Triaje::with('user')->findOrFail($id);
        
        
        if (!is_array($triaje->sintomas) && !empty($triaje->sintomas)) {
            $triaje->sintomas = json_decode($triaje->sintomas, true);
        }
        
        return view('admin.triajes.hoja-vida', compact('triaje'));
    }
}