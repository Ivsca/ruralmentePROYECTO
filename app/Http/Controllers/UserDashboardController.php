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

        
        if ($user->isAdmin()) {
            return redirect()->route('admin.panel');
        }

        $stats = [
          
            'total_triajes' => $user->triajes()->count(),
            'mis_triajes' => $user->triajes()->count(),
            'triajes_hoy' => $user->triajes()->whereDate('created_at', Carbon::today())->count(),
            'triajes_urgentes' => $user->triajes()
                ->whereIn('nivel_atencion', ['Atención inmediata', 'Atención en 24-48 horas'])
                ->count(),
            
          
            'total_productos' => Product::count(),
            'productos_activos' => Product::count(),
            'productos_vendidos' => 0,
            'productos_stock_bajo' => 0,
            
            
            'total_usuarios' => User::count(),
        ];

       
        $misTriajes = $user->triajes()->latest()->take(5)->get();
        
        
        $recentTriajes = $misTriajes;
        $recentUsers = collect(); 
        $recentProducts = Product::latest()->take(5)->get();
        
        
        $distribution = [
            'inmediata' => $user->triajes()->where('nivel_atencion', 'Atención inmediata')->count(),
            'horas_24_48' => $user->triajes()->where('nivel_atencion', 'Atención en 24-48 horas')->count(),
            'prioritaria' => $user->triajes()->where('nivel_atencion', 'Atención prioritaria')->count(),
            'rutinaria' => $user->triajes()->where('nivel_atencion', 'Atención rutinaria')->count(),
        ];
        
        $monthlyStats = [];

       
        return view('dashboard-usuarios', compact(
            'stats',
            'misTriajes',
            'recentTriajes',
            'recentUsers',
            'recentProducts',
            'distribution',
            'monthlyStats',
            'user'  
        ));
    }
}