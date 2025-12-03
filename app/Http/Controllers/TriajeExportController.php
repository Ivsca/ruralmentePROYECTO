<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Triaje;
use Illuminate\Http\Request;
use PDF; 

class TriajeExportController extends Controller
{
    public function export(Request $request)
    {
        $query = Triaje::with('user');

        if ($request->search) {
            $query->where(function($q) use ($request){
                $q->whereHas('user', fn($q2) => $q2->where('name','like', "%{$request->search}%"))
                  ->orWhere('observaciones','like', "%{$request->search}%");
            });
        }
        if ($request->user_id) $query->where('user_id', $request->user_id);
        if ($request->resultado) $query->where('resultado', $request->resultado);
        if ($request->date_from) $query->whereDate('created_at','>=',$request->date_from);
        if ($request->date_to) $query->whereDate('created_at','<=',$request->date_to);

        $triajes = $query->orderBy('created_at','desc')->get();

        $pdf = PDF::loadView('admin.triaje-export', compact('triajes'));
        return $pdf->download('triajes_export_' . now()->format('Ymd_His') . '.pdf');
    }
}
