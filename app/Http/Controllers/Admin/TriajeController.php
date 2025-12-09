<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Triaje;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\TriajesExport;

class TriajeController extends Controller
{
    // Constructor - solo para admin
    public function __construct()
    {
        $this->middleware(['auth', 'can:admin.index']);
    }

    /**
     * Display a listing of all triajes (admin view).
     */
    public function index()
    {
        $triajes = Triaje::paginate(15);
        return view('triaje-admin.index', compact('triajes'));
    }

    /**
     * Display the specified triaje (admin view).
     */
    public function show($id)
    {
        // Cargar el triaje con el usuario relacionado
        $triaje = Triaje::with('user')->findOrFail($id);
        
        // Convertir síntomas a array si es necesario
        if (!is_array($triaje->sintomas) && !empty($triaje->sintomas)) {
            $triaje->sintomas = json_decode($triaje->sintomas, true);
        }
        
        return view('servicios.triaje-resultado', compact('triaje'));
    }

    /**
     * Remove the specified triaje from storage.
     */
    public function destroy($id)
    {
        $triaje = Triaje::findOrFail($id);
        $triaje->delete();
        
        return redirect()->route('admin.triajes.index')
            ->with('success', 'Triaje eliminado exitosamente.');
    }

    /**
     * Export triajes to Excel.
     */
    public function export()
    {
        return Excel::download(new TriajesExport, 'triajes_' . date('Y-m-d_H-i-s') . '.xlsx');
    }

    /**
     * Show hoja de vida (detailed view for admin).
     */
    public function hojaVida($id)
    {
        $triaje = Triaje::with('user')->findOrFail($id);
        
        // Convertir síntomas a array si es necesario
        if (!is_array($triaje->sintomas) && !empty($triaje->sintomas)) {
            $triaje->sintomas = json_decode($triaje->sintomas, true);
        }
        
        return view('admin.triajes.hoja-vida', compact('triaje'));
    }
}