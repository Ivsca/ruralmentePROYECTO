<?php

namespace App\Http\Controllers;

use App\Models\Triaje;
use Illuminate\Http\Request;

class TriajeController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    
    public function create()
    {
        return view('servicios.triaje');
    }


    
    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre_paciente' => 'required|string|max:255',
            'edad' => 'required|integer|min:0|max:120',
            'genero' => 'required|in:Masculino,Femenino,Otro',
            'riesgo_suicida' => 'required',
            'riesgo_autolesion' => 'required',
            'sintomas' => 'nullable|array',
            'funcion_diaria' => 'required',
            'sistema_apoyo' => 'required',
            'urgencia' => 'required',
            'contexto' => 'nullable|string|max:2000'
        ]);

        $data['user_id'] = auth()->id();
        
        
        if (isset($data['sintomas'])) {
            $data['sintomas'] = array_values($data['sintomas']);
        }

        
        $nivel = $this->calcularNivelAtencion($data);
        $data['nivel_atencion'] = $nivel;
        $data['recomendaciones'] = $this->generarRecomendaciones($nivel);

        $triaje = Triaje::create($data);

        
        return redirect()->route('triaje.show', $triaje->id)
            ->with('success', 'Triaje guardado exitosamente.');
    }

    
    public function show($id)
    {
        $triaje = Triaje::with('user')->findOrFail($id);
    
        
        if (!auth()->user()->hasRole('admin') && auth()->id() !== $triaje->user_id) {
            abort(403, 'No tienes permiso para ver este triaje');
        }
        
        
        if (auth()->user()->hasRole('admin')) {
            return view('servicios.triaje-resultado', compact('triaje'));
        }
        
        
        return view('servicios.triaje-resultado', compact('triaje'));
    }

    public function showAdmin($id)
    {
        
        if (!auth()->user()->hasRole('admin')) {
            abort(403, 'Acceso no autorizado');
        }
        
        $triaje = Triaje::with('user')->findOrFail($id);
        
        return view('servicios.triaje-hoja-vida', compact('triaje'));
    }

    protected function calcularNivelAtencion(array $d)
    {
        
        if(str_contains($d['riesgo_suicida'], 'crítico') || 
           str_contains($d['riesgo_autolesion'], 'activo') || 
           str_contains($d['urgencia'], 'Crítica')){
            return 'Atención inmediata';
        }
        
        if(str_contains($d['riesgo_suicida'], 'alto') || 
           str_contains($d['riesgo_autolesion'], 'actual')){
            return 'Atención en 24-48 horas';
        }
        
        
        if(str_contains($d['funcion_diaria'], 'Bajo') || 
           str_contains($d['funcion_diaria'], 'Crítico') || 
           str_contains($d['urgencia'], 'Alta')){
            return 'Atención prioritaria';
        }
        
        
        if(isset($d['sintomas']) && count($d['sintomas']) >= 3){
            return 'Atención prioritaria';
        }
        
        return 'Atención rutinaria';
    }

    protected function generarRecomendaciones(string $nivel)
    {
        $map = [
            'Atención inmediata' => "1. Intervención de crisis con psicólogo clínico\n2. Contacto con red de apoyo inmediata\n3. Evaluación psiquiátrica urgente\n4. Posible traslado a servicios de urgencia\n5. Monitoreo constante las primeras 24 horas",
            'Atención en 24-48 horas' => "1. Cita prioritaria con psicólogo en máximo 48 horas\n2. Monitoreo diario vía telefónica\n3. Activación de red de apoyo familiar\n4. Plan de seguridad específico\n5. Evaluación psiquiátrica en la siguiente semana",
            'Atención prioritaria' => "1. Citas semanales con psicólogo\n2. Seguimiento telefónico bisemanal\n3. Valoración multidisciplinaria\n4. Participación en talleres terapéuticos\n5. Evaluación cada 2 semanas",
            'Atención rutinaria' => "1. Consulta psicológica programada cada 15 días\n2. Participación en talleres de desarrollo personal\n3. Seguimiento mensual\n4. Ejercicios de autocuidado\n5. Revaluación en 1 mes",
        ];
        
        return $map[$nivel] ?? "Recomendaciones por definir.";
    }

    public function index()
    {
        
        $triajes = auth()->user()->triajes()
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        
        if ($triajes->isEmpty()) {
            return redirect()->route('triaje.create')
                ->with('info', 'No tienes triajes registrados. Completa el formulario para crear uno.');
        }
        
        return view('servicios.triajes-usuario', compact('triajes'));
    }
}