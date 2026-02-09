@extends('layouts.admin')

@section('page-title','Pedidos')
@section('page-subtitle','Órdenes realizadas por los usuarios')

@section('content')
<div class="ad-wrap">
  <h3>📦 Pedidos</h3>

  <table class="table table-hover">
    <thead>
      <tr>
        <th>#</th>
        <th>Usuario</th>
        <th>Total</th>
        <th>Estado</th>
        <th>Fecha</th>
        <th></th>
      </tr>
    </thead>

    <tbody>
      @forelse($pedidos as $pedidos)
        <tr>
          <td>{{ $pedidos->id }}</td>
          <td>{{ $pedidos->user->name }}</td>
          <td>$ {{ number_format($pedidos->total,2) }}</td>
          <td>
            <span class="badge bg-info">{{ $pedidos->status }}</span>
          </td>
          <td>{{ $pedidos->created_at->format('d/m/Y') }}</td>
          <td>
            <a href="{{ route('admin.pedidos.show',$pedidos) }}" class="btn btn-sm btn-outline-primary">
              Ver
            </a>
          </td>
        </tr>
      @empty
        <tr>
          <td colspan="6" class="text-center text-muted">
            No hay pedidos aún.
          </td>
        </tr>
      @endforelse
    </tbody>
  </table>
</div>
@endsection
