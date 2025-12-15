@extends('layouts.admin')

@section('page-title', 'Detalle de Usuario')
@section('page-subtitle', 'Información completa del usuario')

@push('styles')
<style>
    .user-detail-container {
        max-width: 1200px;
        margin: 0 auto;
    }

   
    .page-header-detail {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 2.5rem;
        padding-bottom: 1.5rem;
        border-bottom: 2px solid rgba(46, 139, 87, 0.1);
    }

    .page-title-detail h1 {
        color: var(--text-primary);
        font-size: 1.8rem;
        font-weight: 700;
        margin-bottom: 0.5rem;
        display: flex;
        align-items: center;
        gap: 0.75rem;
    }

    .page-title-detail h1 i {
        color: var(--primary-green);
        font-size: 1.6rem;
    }

    .page-subtitle-detail {
        color: var(--text-light);
        font-size: 0.95rem;
        margin-top: 0.25rem;
    }

    .back-button {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.85rem 1.75rem;
        background: var(--bg-card);
        color: var(--primary-green);
        border-radius: var(--radius-full);
        text-decoration: none;
        font-weight: 600;
        font-size: 0.95rem;
        transition: var(--transition-smooth);
        border: 1px solid rgba(46, 139, 87, 0.2);
        box-shadow: var(--shadow-sm);
    }

    .back-button:hover {
        background: rgba(46, 139, 87, 0.1);
        transform: translateX(-5px);
        border-color: var(--primary-green);
        box-shadow: var(--shadow-md);
    }

    
    .user-info-card {
        background: var(--bg-card);
        border-radius: var(--radius-xl);
        padding: 2rem;
        border: 1px solid rgba(46, 139, 87, 0.1);
        box-shadow: var(--shadow-md);
        margin-bottom: 2rem;
        position: relative;
        overflow: hidden;
    }

    .user-info-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 4px;
        background: var(--green-gradient);
        border-radius: var(--radius-xl) var(--radius-xl) 0 0;
    }

    .card-header {
        display: flex;
        align-items: center;
        gap: 1rem;
        margin-bottom: 1.5rem;
        padding-bottom: 1rem;
        border-bottom: 1px solid rgba(46, 139, 87, 0.1);
    }

    .user-avatar-large {
        width: 80px;
        height: 80px;
        border-radius: var(--radius-full);
        background: var(--sky-gradient);
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-weight: 700;
        font-size: 1.75rem;
        box-shadow: 0 4px 12px rgba(41, 182, 246, 0.3);
    }

    .user-header-info {
        flex: 1;
    }

    .user-header-info h2 {
        font-size: 1.4rem;
        font-weight: 700;
        color: var(--text-primary);
        margin-bottom: 0.25rem;
    }

    .user-header-info p {
        color: var(--text-light);
        font-size: 0.95rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .user-header-info p i {
        color: var(--primary-green);
    }

    
    .info-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 1.5rem;
    }

    .info-item {
        background: linear-gradient(135deg, rgba(46, 139, 87, 0.03) 0%, rgba(255, 255, 255, 1) 100%);
        padding: 1.25rem;
        border-radius: var(--radius-lg);
        border: 1px solid rgba(46, 139, 87, 0.1);
        transition: var(--transition-smooth);
    }

    .info-item:hover {
        transform: translateY(-3px);
        box-shadow: var(--shadow-sm);
        border-color: rgba(46, 139, 87, 0.2);
    }

    .info-label {
        font-size: 0.85rem;
        font-weight: 600;
        color: var(--text-light);
        text-transform: uppercase;
        letter-spacing: 0.05em;
        margin-bottom: 0.5rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .info-label i {
        color: var(--primary-green);
        font-size: 0.9rem;
    }

    .info-value {
        font-size: 1.1rem;
        color: var(--text-primary);
        font-weight: 500;
    }

    .info-value-secondary {
        font-size: 0.9rem;
        color: var(--text-light);
        margin-top: 0.25rem;
    }

    
    .section-card {
        background: var(--bg-card);
        border-radius: var(--radius-xl);
        padding: 2rem;
        border: 1px solid rgba(46, 139, 87, 0.1);
        box-shadow: var(--shadow-md);
        margin-bottom: 2rem;
    }

    .section-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 1.5rem;
        padding-bottom: 1rem;
        border-bottom: 1px solid rgba(46, 139, 87, 0.1);
    }

    .section-title {
        font-size: 1.25rem;
        font-weight: 700;
        color: var(--text-primary);
        display: flex;
        align-items: center;
        gap: 0.75rem;
    }

    .section-title i {
        color: var(--primary-green);
    }

    .section-count {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.4rem 0.875rem;
        background: var(--green-gradient);
        color: white;
        border-radius: var(--radius-full);
        font-size: 0.85rem;
        font-weight: 600;
        box-shadow: 0 4px 8px rgba(46, 139, 87, 0.2);
    }

    
    .table-container {
        overflow-x: auto;
        border-radius: var(--radius-lg);
        border: 1px solid rgba(46, 139, 87, 0.1);
    }

    .data-table {
        width: 100%;
        border-collapse: separate;
        border-spacing: 0;
    }

    .data-table thead {
        background: linear-gradient(135deg, rgba(46, 139, 87, 0.05) 0%, rgba(60, 179, 113, 0.1) 100%);
    }

    .data-table th {
        padding: 1rem 1.25rem;
        text-align: left;
        color: var(--primary-green);
        font-weight: 600;
        font-size: 0.85rem;
        text-transform: uppercase;
        letter-spacing: 0.05em;
        border-bottom: 2px solid rgba(46, 139, 87, 0.1);
        white-space: nowrap;
    }

    .data-table th:first-child {
        border-top-left-radius: var(--radius-lg);
        padding-left: 1.5rem;
    }

    .data-table th:last-child {
        border-top-right-radius: var(--radius-lg);
        padding-right: 1.5rem;
    }

    .data-table td {
        padding: 1rem 1.25rem;
        color: var(--text-secondary);
        border-bottom: 1px solid rgba(46, 139, 87, 0.08);
        vertical-align: middle;
    }

    .data-table td:first-child {
        padding-left: 1.5rem;
    }

    .data-table td:last-child {
        padding-right: 1.5rem;
    }

    .data-table tbody tr {
        transition: var(--transition-smooth);
    }

    .data-table tbody tr:hover {
        background: linear-gradient(90deg, rgba(46, 139, 87, 0.02) 0%, rgba(255, 255, 255, 0) 100%);
    }

    .data-table tbody tr:last-child td {
        border-bottom: none;
    }

    
    .table-action-btn {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.5rem 1rem;
        border-radius: var(--radius-md);
        text-decoration: none;
        font-size: 0.85rem;
        font-weight: 500;
        transition: var(--transition-smooth);
    }

    .btn-view {
        background: linear-gradient(135deg, rgba(79, 195, 247, 0.1) 0%, rgba(41, 182, 246, 0.2) 100%);
        color: var(--sky-blue);
        border: 1px solid rgba(79, 195, 247, 0.2);
    }

    .btn-view:hover {
        background: var(--sky-gradient);
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(79, 195, 247, 0.3);
    }

   
    .empty-section {
        text-align: center;
        padding: 3rem 2rem;
        background: linear-gradient(135deg, rgba(46, 139, 87, 0.03) 0%, rgba(255, 255, 255, 1) 100%);
        border-radius: var(--radius-lg);
        border: 2px dashed rgba(46, 139, 87, 0.2);
    }

    .empty-icon {
        width: 60px;
        height: 60px;
        background: linear-gradient(135deg, rgba(46, 139, 87, 0.1) 0%, rgba(46, 139, 87, 0.05) 100%);
        color: var(--primary-green);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
        margin: 0 auto 1rem;
        box-shadow: 0 4px 12px rgba(46, 139, 87, 0.1);
    }

    .empty-section p {
        color: var(--text-light);
        margin-bottom: 0;
    }

    
    .delete-section {
        text-align: right;
        margin-top: 2rem;
        padding-top: 2rem;
        border-top: 2px solid rgba(46, 139, 87, 0.1);
    }

    .btn-delete {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        padding: 1rem 2rem;
        background: linear-gradient(135deg, #EF4444 0%, #DC2626 100%);
        color: white;
        border: none;
        border-radius: var(--radius-full);
        font-weight: 600;
        font-size: 1rem;
        cursor: pointer;
        transition: var(--transition-smooth);
        box-shadow: 0 4px 12px rgba(239, 68, 68, 0.2);
    }

    .btn-delete:hover {
        transform: translateY(-3px);
        box-shadow: 0 6px 16px rgba(239, 68, 68, 0.3);
        background: linear-gradient(135deg, #DC2626 0%, #B91C1C 100%);
    }

    /* Responsive */
    @media (max-width: 768px) {
        .page-header-detail {
            flex-direction: column;
            gap: 1.5rem;
            align-items: flex-start;
        }
        
        .user-info-card {
            padding: 1.5rem;
        }
        
        .card-header {
            flex-direction: column;
            text-align: center;
        }
        
        .info-grid {
            grid-template-columns: 1fr;
        }
        
        .section-card {
            padding: 1.5rem;
        }
        
        .section-header {
            flex-direction: column;
            gap: 1rem;
            align-items: flex-start;
        }
        
        .data-table th,
        .data-table td {
            padding: 0.875rem 0.75rem;
            font-size: 0.9rem;
        }
        
        .data-table th:first-child,
        .data-table td:first-child {
            padding-left: 1rem;
        }
        
        .data-table th:last-child,
        .data-table td:last-child {
            padding-right: 1rem;
        }
        
        .delete-section {
            text-align: center;
        }
        
        .btn-delete {
            width: 100%;
            justify-content: center;
        }
    }
</style>
@endpush

@section('content')

<div class="user-detail-container">
    
    
    <div class="page-header-detail">
        <div class="page-title-detail">
            <h1>
                <i class="fas fa-user-circle"></i> Detalle de Usuario
            </h1>
            <p class="page-subtitle-detail">
                Información completa y actividad del usuario en el sistema
            </p>
        </div>

        <a href="{{ route('admin.users.index') }}" class="back-button">
            <i class="fas fa-arrow-left"></i>
            Volver a Usuarios
        </a>
    </div>

    
    <div class="user-info-card">
        <div class="card-header">
            <div class="user-avatar-large">
                {{ strtoupper(substr($user->name, 0, 1)) }}
            </div>
            <div class="user-header-info">
                <h2>{{ $user->name }}</h2>
                <p>
                    <i class="fas fa-id-card"></i>
                    ID: {{ $user->id }} • Registrado en Ruralmente
                </p>
            </div>
        </div>

        <div class="info-grid">
            <div class="info-item">
                <div class="info-label">
                    <i class="fas fa-user"></i>
                    Información Personal
                </div>
                <div class="info-value">{{ $user->name }}</div>
                <div class="info-value-secondary">
                    <i class="fas fa-envelope"></i> {{ $user->email }}
                </div>
            </div>

            <div class="info-item">
                <div class="info-label">
                    <i class="fas fa-calendar-plus"></i>
                    Registro
                </div>
                <div class="info-value">{{ $user->created_at->format('d/m/Y') }}</div>
                <div class="info-value-secondary">
                    <i class="fas fa-clock"></i> {{ $user->created_at->format('H:i') }} • 
                    {{ $user->created_at->diffForHumans() }}
                </div>
            </div>

            <div class="info-item">
                <div class="info-label">
                    <i class="fas fa-user-tag"></i>
                    Rol en el Sistema
                </div>
                <div class="info-value">{{ $user->roles->first()->name ?? 'Usuario' }}</div>
                <div class="info-value-secondary">
                    Permisos del sistema
                </div>
            </div>

            <div class="info-item">
                <div class="info-label">
                    <i class="fas fa-heart"></i>
                    Alma Asociada
                </div>
                <div class="info-value">{{ $user->alma->nombre ?? 'No asignada' }}</div>
                <div class="info-value-secondary">
                    {{ $user->alma->descripcion ?? 'Sin información adicional' }}
                </div>
            </div>
        </div>
    </div>

    
    <div class="section-card">
        <div class="section-header">
            <h3 class="section-title">
                <i class="fas fa-clipboard-check"></i>
                Triajes Psicológicos
            </h3>
            @if(!$user->triajes->isEmpty())
                <span class="section-count">
                    <i class="fas fa-list-check"></i>
                    {{ $user->triajes->count() }} evaluaciones
                </span>
            @endif
        </div>

        @if ($user->triajes->isEmpty())
            <div class="empty-section">
                <div class="empty-icon">
                    <i class="fas fa-clipboard-list"></i>
                </div>
                <p>Este usuario no ha completado ningún triaje psicológico.</p>
            </div>
        @else
            <div class="table-container">
                <table class="data-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Fecha</th>
                            <th>Nivel de Atención</th>
                            <th>Síntomas</th>
                            <th>Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($user->triajes as $triaje)
                            <tr>
                                <td>#{{ $triaje->id }}</td>
                                <td>
                                    <div class="info-value">{{ $triaje->created_at->format('d/m/Y') }}</div>
                                    <div class="info-value-secondary">{{ $triaje->created_at->format('H:i') }}</div>
                                </td>
                                <td>
                                    @if($triaje->nivel_atencion)
                                        @php
                                            $badgeClass = 'status-inactive';
                                            if(strpos($triaje->nivel_atencion, 'inmediata') !== false) {
                                                $badgeClass = 'badge-danger';
                                            } elseif(strpos($triaje->nivel_atencion, 'prioritaria') !== false) {
                                                $badgeClass = 'badge-warning';
                                            } else {
                                                $badgeClass = 'badge-success';
                                            }
                                        @endphp
                                        <span class="user-status-badge {{ $badgeClass }}" style="display: inline-flex;">
                                            {{ $triaje->nivel_atencion }}
                                        </span>
                                    @else
                                        <span class="info-value-secondary">N/A</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="info-value" style="font-size: 0.9rem;">
                                        {{ \Illuminate\Support\Str::limit($triaje->sintomas_principales ?? 'Sin síntomas registrados', 50) }}
                                    </div>
                                </td>
                                <td>
                                    <a href="{{ route('admin.triajes.show', $triaje->id) }}" 
                                       class="table-action-btn btn-view">
                                        <i class="fas fa-eye"></i>
                                        Ver Detalles
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>

    
    <div class="section-card">
        <div class="section-header">
            <h3 class="section-title">
                <i class="fas fa-file-invoice-dollar"></i>
                Historial de Facturas
            </h3>
            @if(!$user->invoices->isEmpty())
                @php
                    $totalInvoices = $user->invoices->sum('total');
                @endphp
                <span class="section-count">
                    <i class="fas fa-calculator"></i>
                    ${{ number_format($totalInvoices, 0, ',', '.') }}
                </span>
            @endif
        </div>

        @if ($user->invoices->isEmpty())
            <div class="empty-section">
                <div class="empty-icon">
                    <i class="fas fa-receipt"></i>
                </div>
                <p>Este usuario no tiene facturas registradas en el sistema.</p>
            </div>
        @else
            <div class="table-container">
                <table class="data-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Fecha</th>
                            <th>Total</th>
                            <th>Estado</th>
                            <th>Productos</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($user->invoices as $invoice)
                            <tr>
                                <td>#{{ $invoice->id }}</td>
                                <td>
                                    <div class="info-value">{{ $invoice->created_at->format('d/m/Y') }}</div>
                                    <div class="info-value-secondary">{{ $invoice->created_at->format('H:i') }}</div>
                                </td>
                                <td>
                                    <div class="info-value" style="color: var(--primary-green); font-weight: 600;">
                                        ${{ number_format($invoice->total, 0, ',', '.') }}
                                    </div>
                                </td>
                                <td>
                                    @php
                                        $statusClass = 'status-inactive';
                                        if($invoice->status === 'completed' || $invoice->status === 'pagado') {
                                            $statusClass = 'badge-success';
                                        } elseif($invoice->status === 'pending') {
                                            $statusClass = 'badge-warning';
                                        } elseif($invoice->status === 'cancelled') {
                                            $statusClass = 'badge-danger';
                                        }
                                    @endphp
                                    <span class="user-status-badge {{ $statusClass }}" style="display: inline-flex;">
                                        {{ ucfirst($invoice->status) }}
                                    </span>
                                </td>
                                <td>
                                    <div class="info-value" style="font-size: 0.9rem;">
                                        {{ $invoice->items_count ?? 'N/A' }} items
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>

    
    <div class="delete-section">
        <form action="{{ route('admin.users.destroy', $user->id) }}" 
              method="POST" 
              id="deleteUserForm"
              data-user-name="{{ $user->name }}">

            @csrf
            @method('DELETE')

            <button type="button" class="btn-delete" onclick="confirmDeleteUser()">
                <i class="fas fa-trash-alt"></i>
                Eliminar Usuario
            </button>
        </form>
    </div>

</div>

@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        
        const infoItems = document.querySelectorAll('.info-item');
        infoItems.forEach(item => {
            item.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-3px)';
            });
            
            item.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0)';
            });
        });

        
        const tableRows = document.querySelectorAll('.data-table tbody tr');
        tableRows.forEach(row => {
            row.addEventListener('mouseenter', function() {
                this.style.background = 'linear-gradient(90deg, rgba(46, 139, 87, 0.02) 0%, rgba(255, 255, 255, 1) 100%)';
            });
            
            row.addEventListener('mouseleave', function() {
                this.style.background = '';
            });
        });
    });

    
    function confirmDeleteUser() {
        const form = document.getElementById('deleteUserForm');
        const userName = form.getAttribute('data-user-name') || 'este usuario';
        
        Swal.fire({
            title: '¿Eliminar Usuario?',
            html: `
                <div style="text-align: center;">
                    <div style="font-size: 4rem; color: #EF4444; margin-bottom: 1rem;">
                        <i class="fas fa-exclamation-triangle"></i>
                    </div>
                    <p style="margin-bottom: 1rem;">
                        <strong>¿Estás seguro de eliminar a "${userName}"?</strong>
                    </p>
                    <p style="color: #6B7280; font-size: 0.9rem; margin-bottom: 1.5rem;">
                        Esta acción eliminará permanentemente:
                        <br>
                        • Todos los datos del usuario
                        <br>
                        • Historial de triajes
                        <br>
                        • Facturas asociadas
                        <br>
                        <strong>Esta acción no se puede deshacer.</strong>
                    </p>
                </div>
            `,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#EF4444',
            cancelButtonColor: '#6B7280',
            confirmButtonText: 'Sí, eliminar permanentemente',
            cancelButtonText: 'Cancelar',
            reverseButtons: true,
            backdrop: true,
            allowOutsideClick: false,
            allowEscapeKey: false,
            width: '500px'
        }).then((result) => {
            if (result.isConfirmed) {
                
                Swal.fire({
                    title: 'Eliminando usuario...',
                    text: 'Por favor espera',
                    allowOutsideClick: false,
                    allowEscapeKey: false,
                    didOpen: () => {
                        Swal.showLoading();
                    }
                });
                
                
                form.submit();
            }
        });
    }

    
    const deleteButtons = document.querySelectorAll('.btn-delete');
    deleteButtons.forEach(button => {
        if (!button.hasAttribute('onclick')) {
            button.addEventListener('click', function(e) {
                e.preventDefault();
                const form = this.closest('form');
                const userName = form.getAttribute('data-user-name') || 'este usuario';
                confirmDeleteUser(form, userName);
            });
        }
    });
</script>

<!-- SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endpush