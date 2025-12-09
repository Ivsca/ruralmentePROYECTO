@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0 text-gray-800">
            <i class="fas fa-clipboard-list"></i> Gestión de Triajes (Admin)
        </h1>
        <div>
            <a href="{{ route('export.triajes') }}" class="btn btn-success">
                <i class="fas fa-file-export"></i> Exportar
            </a>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                <i class="fas fa-users"></i> Todos los Triajes Registrados
            </h6>
        </div>
        <div class="card-body">
            @if($triajes->isEmpty())
                <div class="alert alert-info">
                    No hay triajes registrados en el sistema.
                </div>
            @else
                <div class="table-responsive">
                    <table class="table table-bordered table-hover" id="triajesTable" width="100%" cellspacing="0">
                        <thead class="table-dark">
                            <tr>
                                <th>ID</th>
                                <th>Paciente</th>
                                <th>Usuario</th>
                                <th>Edad</th>
                                <th>Género</th>
                                <th>Nivel</th>
                                <th>Fecha</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($triajes as $triaje)
                            <tr>
                                <td>{{ $triaje->id }}</td>
                                <td>
                                    <strong>{{ $triaje->nombre_paciente }}</strong>
                                </td>
                                <td>
                                    @if($triaje->user)
                                        {{ $triaje->user->name }}<br>
                                        <small class="text-muted">{{ $triaje->user->email }}</small>
                                    @else
                                        <span class="text-muted">Usuario no disponible</span>
                                    @endif
                                </td>
                                <td>{{ $triaje->edad }} años</td>
                                <td>{{ $triaje->genero }}</td>
                                <td>
                                    @php
                                        $badgeClass = match($triaje->nivel_atencion) {
                                            'Atención inmediata' => 'danger',
                                            'Atención en 24-48 horas' => 'warning',
                                            'Atención prioritaria' => 'info',
                                            default => 'success'
                                        };
                                    @endphp
                                    <span class="badge bg-{{ $badgeClass }}">
                                        {{ $triaje->nivel_atencion }}
                                    </span>
                                </td>
                                <td>
                                    {{ $triaje->created_at->format('d/m/Y') }}<br>
                                    <small class="text-muted">{{ $triaje->created_at->format('H:i') }}</small>
                                </td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('triajes.show', $triaje->id) }}" 
                                           class="btn btn-info btn-sm" 
                                           title="Ver detalles">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ route('triaje.show', $triaje->id) }}" 
                                           class="btn btn-primary btn-sm" 
                                           title="Ver resultado">
                                            <i class="fas fa-file-medical"></i>
                                        </a>
                                        <form action="{{ route('triajes.destroy', $triaje->id) }}" 
                                              method="POST" 
                                              class="d-inline"
                                              onsubmit="return confirm('¿Estás seguro de eliminar este triaje?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" title="Eliminar">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                
                <!-- Paginación -->
                <div class="d-flex justify-content-center mt-4">
                    {{ $triajes->links() }}
                </div>
            @endif
        </div>
    </div>
</div>

@push('styles')
<style>
    #triajesTable th {
        background-color: #4e73df;
        color: white;
    }
    .table-hover tbody tr:hover {
        background-color: rgba(78, 115, 223, 0.05);
    }
</style>
@endpush

@push('scripts')
<script>
    $(document).ready(function() {
        // Inicializar DataTable si lo necesitas
        // $('#triajesTable').DataTable({
        //     language: {
        //         url: '//cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json'
        //     }
        // });
    });
</script>
@endpush
@endsection