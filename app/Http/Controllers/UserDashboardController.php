<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Triaje;
use App\Models\Product;
use App\Models\User;
use Carbon\Carbon;

class UserDashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        // Si es admin, redirigir al panel admin
        if ($user->isAdmin()) {
            return redirect()->route('admin.panel');
        }

        $stats = [
            // Triajes del usuario
            'total_triajes' => $user->triajes()->count(),
            'mis_triajes' => $user->triajes()->count(),
            'triajes_pendientes' => $user->triajes()->where('estado', 'pendiente')->count(),
            'triajes_completados' => $user->triajes()->where('estado', 'completado')->count(),
            'triajes_hoy' => $user->triajes()->whereDate('created_at', Carbon::today())->count(),
            'triajes_urgentes' => $user->triajes()
                ->whereIn('nivel_atencion', ['Atención inmediata', 'Atención en 24-48 horas'])
                ->count(),
            
            // Productos (información general)
            'total_productos' => Product::count(),
            'productos_activos' => Product::count(),
            'productos_vendidos' => 0,
            'productos_stock_bajo' => 0,
            
            // Usuarios (información general)
            'total_usuarios' => User::count(),
        ];

        // Triajes recientes del usuario
        $misTriajes = $user->triajes()->latest()->take(5)->get();
        
        // Alias para compatibilidad con la vista
        $recentTriajes = $misTriajes;
        $recentUsers = collect(); // Colección vacía
        $recentProducts = Product::latest()->take(5)->get();
        
        // Distribución (solo del usuario)
        $distribution = [
            'inmediata' => $user->triajes()->where('nivel_atencion', 'Atención inmediata')->count(),
            'horas_24_48' => $user->triajes()->where('nivel_atencion', 'Atención en 24-48 horas')->count(),
            'prioritaria' => $user->triajes()->where('nivel_atencion', 'Atención prioritaria')->count(),
            'rutinaria' => $user->triajes()->where('nivel_atencion', 'Atención rutinaria')->count(),
        ];
        
        $monthlyStats = [];

        // Asegúrate de que la vista se llame dashboard-usuarios
        return view('dashboard-usuarios', compact(
            'stats',
            'misTriajes',
            'recentTriajes',
            'recentUsers',
            'recentProducts',
            'distribution',
            'monthlyStats',
            'user'  // ¡IMPORTANTE! Pasar el usuario a la vista
        ));
    }
}