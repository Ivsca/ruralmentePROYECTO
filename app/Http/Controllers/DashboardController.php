<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Triaje;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'total_triajes' => Triaje::count(),
            'triajes_hoy' => Triaje::whereDate('created_at', today())->count(),
            'triajes_urgentes' => Triaje::whereIn('nivel_atencion', ['Atención inmediata', 'Atención en 24-48 horas'])->count(),
            
            'total_productos' => Product::count(),
            'productos_vendidos' => 0, // Aquí necesitarías lógica para productos vendidos
            'productos_stock_bajo' => 0, // Aquí necesitarías lógica para stock bajo
            
            'total_usuarios' => User::count(),
        ];
        
        // Triajes recientes
        $recentTriajes = Triaje::with('user')
            ->latest()
            ->take(5)
            ->get();
        
        // Usuarios recientes
        $recentUsers = User::latest()
            ->take(5)
            ->get();
        
        // Productos recientes
        $recentProducts = Product::latest()
            ->take(5)
            ->get();
        
        // Distribución por nivel de atención
        $distribution = [
            'inmediata' => Triaje::where('nivel_atencion', 'Atención inmediata')->count(),
            'horas_24_48' => Triaje::where('nivel_atencion', 'Atención en 24-48 horas')->count(),
            'prioritaria' => Triaje::where('nivel_atencion', 'Atención prioritaria')->count(),
            'rutinaria' => Triaje::where('nivel_atencion', 'Atención rutinaria')->count(),
        ];
        
        // Estadísticas mensuales (últimos 6 meses)
        $monthlyStats = Triaje::select(
                DB::raw('MONTH(created_at) as month'),
                DB::raw('COUNT(*) as count')
            )
            ->where('created_at', '>=', now()->subMonths(6))
            ->groupBy('month')
            ->orderBy('month')
            ->get()
            ->pluck('count', 'month')
            ->toArray();
        
        return view('dashboard', compact(
            'stats',
            'recentTriajes',
            'recentUsers',
            'recentProducts',
            'distribution',
            'monthlyStats'
        ));
    }
    
    public function stats()
    {
        // Lógica para estadísticas detalladas
        return view('admin.stats');
    }
}