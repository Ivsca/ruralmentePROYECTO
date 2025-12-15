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
        $todayUsers = User::whereDate('created_at', today())->count();
        
        return view('admin.users.index', compact('users', 'totalUsers', 'todayUsers'));
    }
    
    public function show($id)
    {
        $user = User::with([
            'triajes',
            'invoices',
            'alma'
        ])->findOrFail($id);

        return view('admin.users.show', compact('user'));
    }
    
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        
        
        $user->delete();
        
        return redirect()->route('admin.users.index')
            ->with('success', 'Usuario eliminado correctamente.');
    }
    
    public function export()
    {
        
        return response()->streamDownload(function () {
            
        }, 'usuarios_' . date('Y-m-d') . '.csv');
    }
}