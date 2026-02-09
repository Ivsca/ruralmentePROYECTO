<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\CotizacionMail;
use Mail;

class CotizacionController extends Controller
{
    public function enviar(Request $request)
    {
        $data = $request->validate([
            'empresa' => 'required',
            'nombre' => 'required',
            'cargo' => 'required',
            'correo' => 'required|email',
            'telefono' => 'required',
            'paquete' => 'required',
            'participantes' => 'required|numeric|min:1',
            'proyecto' => 'required',
            'politicas' => 'accepted',
        ]);

        $adminEmail = "campesinosfelices@ruralmente.com.co"; 

        Mail::to($adminEmail)->send(new CotizacionMail($data));

        return back()->with('success', '¡Tu solicitud de cotización ha sido enviada!');
    }
}
