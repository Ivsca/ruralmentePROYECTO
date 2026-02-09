<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pedido;
use Illuminate\Http\Request;

class PedidoController extends Controller
{
    public function index(Request $request)
    {
        $pedidos = Pedido::with('user')
            ->latest()
            ->paginate(15);

        return view('admin.pedidos.index', compact('pedidos'));
    }

    public function show(Pedido $pedido)
    {
        $pedido->load('user', 'items.product');
        return view('admin.pedidos.show', compact('pedido'));
    }

    public function updateEstado(Request $request, Pedido $pedido)
    {
        $request->validate([
            'estado' => 'required|in:pendiente,pagado,enviado,cancelado,completado'
        ]);

        $pedido->update([
            'estado' => $request->estado
        ]);

        return back()->with('success', 'Estado actualizado correctamente');
    }
}
