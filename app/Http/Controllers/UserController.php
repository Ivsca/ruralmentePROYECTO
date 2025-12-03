<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index()
    {
        $users = User::latest()->paginate(10);
        $totalUsers = User::count();
        $activeUsers = User::where('is_active', true)->count();
        $todayUsers = User::whereDate('created_at', today())->count();
        
        return view('admin.users.index', compact('users', 'totalUsers', 'activeUsers', 'todayUsers'));
    }
    
    public function show($id)
    {
        $user = User::with(['triajes', 'orders'])->findOrFail($id);
        return view('admin.users.show', compact('user'));
    }
    
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        
        // Aquí puedes agregar lógica adicional antes de eliminar
        $user->delete();
        
        return redirect()->route('admin.users.index')
            ->with('success', 'Usuario eliminado correctamente.');
    }
    
    public function export()
    {
        // Lógica para exportar usuarios a Excel/PDF
        return response()->streamDownload(function () {
            // Export logic
        }, 'usuarios_' . date('Y-m-d') . '.csv');
    }
}