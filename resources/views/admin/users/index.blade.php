@extends('layouts.admin')

@section('page-title', 'Gestión de Usuarios')
@section('page-subtitle', 'Administración de usuarios registrados')

@push('styles')
<style>
    .users-admin-container {
        max-width: 1200px;
        margin: 0 auto;
    }

    
    .page-header-users {
        margin-bottom: 2.5rem;
        padding-bottom: 1.5rem;
        border-bottom: 2px solid rgba(46, 139, 87, 0.1);
    }

    .page-title-users h1 {
        color: var(--text-primary);
        font-size: 1.8rem;
        font-weight: 700;
        margin-bottom: 0.5rem;
        display: flex;
        align-items: center;
        gap: 0.75rem;
    }

    .page-title-users h1 i {
        color: var(--primary-green);
        font-size: 1.6rem;
    }

    .page-subtitle-users {
        color: var(--text-light);
        font-size: 0.95rem;
        margin-top: 0.25rem;
    }

    .users-stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 1rem;
        margin-bottom: 2rem;
    }

    .stat-card-user {
        text-align: center;
        padding: 1.5rem;
        background: var(--bg-card);
        border-radius: var(--radius-lg);
        border: 1px solid rgba(46, 139, 87, 0.1);
        box-shadow: var(--shadow-sm);
        transition: var(--transition-smooth);
    }

    .stat-card-user:hover {
        transform: translateY(-5px);
        box-shadow: var(--shadow-md);
        border-color: rgba(46, 139, 87, 0.2);
    }

    .stat-icon-user {
        width: 50px;
        height: 50px;
        border-radius: var(--radius-md);
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 1rem;
        font-size: 1.25rem;
    }

    .icon-total { 
        background: linear-gradient(135deg, rgba(46, 139, 87, 0.1) 0%, rgba(60, 179, 113, 0.2) 100%); 
        color: var(--primary-green); 
    }
    
    .icon-active { 
        background: linear-gradient(135deg, rgba(79, 195, 247, 0.1) 0%, rgba(41, 182, 246, 0.2) 100%); 
        color: var(--sky-blue); 
    }
    
    .icon-new { 
        background: linear-gradient(135deg, rgba(16, 185, 129, 0.1) 0%, rgba(5, 150, 105, 0.2) 100%); 
        color: #10B981; 
    }

    .stat-value-user {
        font-size: 2rem;
        font-weight: 800;
        color: var(--text-primary);
        margin-bottom: 0.25rem;
        font-family: 'Poppins', sans-serif;
    }

    .stat-label-user {
        font-size: 0.85rem;
        color: var(--text-light);
        font-weight: 500;
    }

    
    .users-table-container {
        background: var(--bg-card);
        border-radius: var(--radius-xl);
        overflow: hidden;
        box-shadow: var(--shadow-md);
        border: 1px solid rgba(46, 139, 87, 0.1);
        margin-bottom: 2.5rem;
    }

    .table-header-users {
        padding: 1.5rem;
        border-bottom: 1px solid rgba(46, 139, 87, 0.1);
        background: linear-gradient(90deg, rgba(46, 139, 87, 0.05) 0%, rgba(255, 255, 255, 0) 100%);
    }

    .table-header-users h3 {
        color: var(--text-primary);
        font-weight: 600;
        margin: 0;
        display: flex;
        align-items: center;
        gap: 0.75rem;
    }

    .table-header-users h3 i {
        color: var(--primary-green);
    }

    .table-responsive {
        overflow-x: auto;
    }

    .table-users {
        width: 100%;
        border-collapse: separate;
        border-spacing: 0;
    }

    .table-users thead {
        background: linear-gradient(135deg, rgba(46, 139, 87, 0.05) 0%, rgba(60, 179, 113, 0.1) 100%);
    }

    .table-users th {
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

    .table-users th:first-child {
        border-top-left-radius: var(--radius-lg);
        padding-left: 1.5rem;
    }

    .table-users th:last-child {
        border-top-right-radius: var(--radius-lg);
        padding-right: 1.5rem;
    }

    .table-users td {
        padding: 1.25rem 1.25rem;
        color: var(--text-secondary);
        border-bottom: 1px solid rgba(46, 139, 87, 0.08);
        vertical-align: middle;
        transition: var(--transition-smooth);
    }

    .table-users td:first-child {
        padding-left: 1.5rem;
        font-weight: 600;
        color: var(--text-primary);
    }

    .table-users td:last-child {
        padding-right: 1.5rem;
    }

    .table-users tbody tr {
        transition: var(--transition-smooth);
    }

    .table-users tbody tr:hover {
        background: linear-gradient(90deg, rgba(46, 139, 87, 0.02) 0%, rgba(255, 255, 255, 0) 100%);
        transform: translateX(5px);
    }

    .table-users tbody tr:hover td {
        color: var(--text-primary);
    }

    .table-users tbody tr:last-child td {
        border-bottom: none;
    }

    
    .user-info-cell {
        display: flex;
        align-items: center;
        gap: 1rem;
    }

    .user-avatar-small {
        width: 40px;
        height: 40px;
        border-radius: var(--radius-full);
        background: var(--sky-gradient);
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-weight: 600;
        font-size: 0.9rem;
        flex-shrink: 0;
    }

    .user-details {
        display: flex;
        flex-direction: column;
        gap: 0.25rem;
    }

    .user-name {
        font-weight: 600;
        color: var(--text-primary);
    }

    .user-email {
        font-size: 0.85rem;
        color: var(--text-light);
    }

    
    .user-status-badge {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.4rem 0.875rem;
        border-radius: var(--radius-full);
        font-size: 0.75rem;
        font-weight: 600;
    }

    .status-active { 
        background: linear-gradient(135deg, rgba(16, 185, 129, 0.1) 0%, rgba(16, 185, 129, 0.2) 100%); 
        color: #10B981; 
        border: 1px solid rgba(16, 185, 129, 0.2);
    }

    .status-inactive { 
        background: linear-gradient(135deg, rgba(239, 68, 68, 0.1) 0%, rgba(239, 68, 68, 0.2) 100%); 
        color: #EF4444; 
        border: 1px solid rgba(239, 68, 68, 0.2);
    }

    
    .action-buttons-users {
        display: flex;
        gap: 0.5rem;
    }

    .btn-action-user {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 36px;
        height: 36px;
        border-radius: var(--radius-md);
        text-decoration: none;
        transition: var(--transition-smooth);
        border: none;
        cursor: pointer;
        font-size: 0.85rem;
    }

    .btn-view-user {
        background: linear-gradient(135deg, rgba(79, 195, 247, 0.1) 0%, rgba(41, 182, 246, 0.2) 100%);
        color: var(--sky-blue);
        border: 1px solid rgba(79, 195, 247, 0.2);
    }

    .btn-view-user:hover {
        background: var(--sky-gradient);
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(79, 195, 247, 0.3);
    }

    .btn-delete-user {
        background: linear-gradient(135deg, rgba(239, 68, 68, 0.1) 0%, rgba(239, 68, 68, 0.2) 100%);
        color: #EF4444;
        border: 1px solid rgba(239, 68, 68, 0.2);
    }

    .btn-delete-user:hover {
        background: linear-gradient(135deg, #EF4444 0%, #DC2626 100%);
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(239, 68, 68, 0.3);
    }

    
    .empty-state-users {
        text-align: center;
        padding: 4rem 2rem;
        background: var(--bg-card);
        border-radius: var(--radius-xl);
        border: 2px dashed rgba(46, 139, 87, 0.2);
        transition: var(--transition-smooth);
        margin: 2rem 0;
    }

    .empty-state-users:hover {
        border-color: rgba(46, 139, 87, 0.3);
        transform: translateY(-5px);
    }

    .empty-icon-users {
        width: 80px;
        height: 80px;
        background: linear-gradient(135deg, rgba(46, 139, 87, 0.1) 0%, rgba(46, 139, 87, 0.05) 100%);
        color: var(--primary-green);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 2rem;
        margin: 0 auto 1.5rem;
        box-shadow: 0 4px 12px rgba(46, 139, 87, 0.1);
    }

    .empty-state-users h3 {
        color: var(--text-primary);
        margin-bottom: 0.75rem;
        font-size: 1.4rem;
        font-weight: 600;
    }

    .empty-state-users p {
        color: var(--text-light);
        margin-bottom: 2rem;
        font-size: 0.95rem;
        max-width: 400px;
        margin-left: auto;
        margin-right: auto;
    }

    
    .pagination-container-users {
        margin-top: 2.5rem;
        padding: 1.5rem;
        background: var(--bg-card);
        border-radius: var(--radius-lg);
        border: 1px solid rgba(46, 139, 87, 0.1);
        box-shadow: var(--shadow-sm);
    }

    .pagination-users {
        display: flex;
        justify-content: center;
        list-style: none;
        padding: 0;
        margin: 0;
        flex-wrap: wrap;
        gap: 0.5rem;
    }

    .pagination-users li {
        margin: 0;
    }

    .pagination-users .page-link,
    .pagination-users .page-item.disabled .page-link,
    .pagination-users .page-item.active .page-link {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        min-width: 40px;
        height: 40px;
        padding: 0 0.75rem;
        border-radius: var(--radius-md);
        text-decoration: none;
        font-weight: 500;
        transition: var(--transition-smooth);
        border: 1px solid rgba(46, 139, 87, 0.1);
        background: var(--bg-card);
        color: var(--text-secondary);
    }

    .pagination-users .page-link:hover {
        background: rgba(46, 139, 87, 0.1);
        color: var(--primary-green);
        transform: translateY(-2px);
        border-color: var(--primary-green);
        box-shadow: var(--shadow-sm);
    }

    .pagination-users .page-item.active .page-link {
        background: var(--green-gradient);
        color: white;
        border-color: var(--primary-green);
        box-shadow: 0 4px 8px rgba(46, 139, 87, 0.2);
        transform: translateY(-2px);
    }

    .pagination-users .page-item.disabled .page-link {
        color: var(--text-light);
        opacity: 0.5;
        cursor: not-allowed;
        background: var(--gray-100);
    }

    /* Responsive */
    @media (max-width: 768px) {
        .users-stats-grid {
            grid-template-columns: repeat(2, 1fr);
        }
        
        .table-users th,
        .table-users td {
            padding: 1rem 0.75rem;
            font-size: 0.9rem;
        }
        
        .table-users th:first-child,
        .table-users td:first-child {
            padding-left: 1rem;
        }
        
        .table-users th:last-child,
        .table-users td:last-child {
            padding-right: 1rem;
        }
        
        .action-buttons-users {
            flex-direction: column;
            gap: 0.5rem;
        }
        
        .btn-action-user {
            width: 100%;
            min-width: 36px;
        }
        
        .user-info-cell {
            flex-direction: column;
            align-items: flex-start;
            gap: 0.5rem;
        }
        
        .empty-state-users {
            padding: 3rem 1.5rem;
        }
        
        .empty-icon-users {
            width: 60px;
            height: 60px;
            font-size: 1.5rem;
        }
    }

    @media (max-width: 480px) {
        .users-stats-grid {
            grid-template-columns: 1fr;
        }
        
        .page-title-users h1 {
            font-size: 1.5rem;
        }
        
        .stat-value-user {
            font-size: 1.75rem;
        }
        
        .pagination-users {
            gap: 0.25rem;
        }
        
        .pagination-users .page-link {
            min-width: 36px;
            height: 36px;
            font-size: 0.9rem;
        }
    }
</style>
@endpush

@section('content')

<div class="users-admin-container">
    
    
    <div class="page-header-users">
        <div class="page-title-users">
            <h1>
                <i class="fas fa-users-cog"></i> Gestión de Usuarios
            </h1>
            <p class="page-subtitle-users">
                Administra los usuarios registrados en el sistema Ruralmente
            </p>
        </div>
    </div>

    
    <div class="users-stats-grid">
        <div class="stat-card-user">
            <div class="stat-icon-user icon-total">
                <i class="fas fa-users"></i>
            </div>
            <div class="stat-value-user">{{ $users->total() }}</div>
            <div class="stat-label-user">Total de Usuarios</div>
        </div>
        
        <div class="stat-card-user">
            <div class="stat-icon-user icon-active">
                <i class="fas fa-user-check"></i>
            </div>
            <div class="stat-value-user">{{ $users->where('created_at', '>=', now()->subMonth())->count() }}</div>
            <div class="stat-label-user">Activos este mes</div>
        </div>
        
        <div class="stat-card-user">
            <div class="stat-icon-user icon-new">
                <i class="fas fa-user-plus"></i>
            </div>
            <div class="stat-value-user">{{ $users->where('created_at', '>=', now()->subWeek())->count() }}</div>
            <div class="stat-label-user">Nuevos (7 días)</div>
        </div>
    </div>

    
    @if($users->count() > 0)
        <div class="users-table-container">
            <div class="table-header-users">
                <h3>
                    <i class="fas fa-list-ul"></i>
                    Listado de Usuarios Registrados
                </h3>
            </div>
            
            <div class="table-responsive">
                <table class="table-users">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Usuario</th>
                            <th>Email</th>
                            <th>Registro</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>#{{ $user->id }}</td>
                                
                                <td>
                                    <div class="user-info-cell">
                                        <div class="user-avatar-small">
                                            {{ strtoupper(substr($user->name, 0, 1)) }}
                                        </div>
                                        <div class="user-details">
                                            <span class="user-name">{{ $user->name }}</span>
                                        </div>
                                    </div>
                                </td>
                                
                                <td>
                                    <div class="user-details">
                                        <span class="user-email">{{ $user->email }}</span>
                                    </div>
                                </td>
                                
                                <td>
                                    <div class="user-details">
                                        <span class="user-name">{{ $user->created_at->format('d/m/Y') }}</span>
                                        <span class="user-email">
                                            {{ $user->created_at->diffForHumans() }}
                                        </span>
                                    </div>
                                </td>
                                
                                <td>
                                    @if($user->created_at >= now()->subMonth())
                                        <span class="user-status-badge status-active">
                                            <i class="fas fa-circle"></i>
                                            Activo
                                        </span>
                                    @else
                                        <span class="user-status-badge status-inactive">
                                            <i class="fas fa-circle"></i>
                                            Inactivo
                                        </span>
                                    @endif
                                </td>
                                
                                <td>
                                    <div class="action-buttons-users">
                                        <a 
                                            href="{{ route('admin.users.show', $user->id) }}" 
                                            class="btn-action-user btn-view-user"
                                            title="Ver detalles"
                                        >
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        
                                        <form 
                                            action="{{ route('admin.users.destroy', $user->id) }}" 
                                            method="POST" 
                                            class="d-inline delete-form"
                                            data-user-name="{{ $user->name }}"
                                        >
                                            @csrf
                                            @method('DELETE')
                                            <button 
                                                type="submit" 
                                                class="btn-action-user btn-delete-user"
                                                title="Eliminar usuario"
                                                onclick="return confirmDelete(event, this.closest('form'))"
                                            >
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        
        <div class="pagination-container-users">
            {{ $users->links() }}
        </div>
    @else
        
        <div class="empty-state-users">
            <div class="empty-icon-users">
                <i class="fas fa-users-slash"></i>
            </div>
            <h3>No hay usuarios registrados</h3>
            <p>
                El sistema aún no tiene usuarios registrados. 
                Los usuarios aparecerán aquí cuando se registren.
            </p>
            <a href="{{ route('admin.dashboard') }}" class="btn-action-user btn-view-user" style="display: inline-flex; width: auto; padding: 0.75rem 1.5rem;">
                <i class="fas fa-arrow-left"></i>
                Volver al Dashboard
            </a>
        </div>
    @endif
</div>

@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        
        const statCards = document.querySelectorAll('.stat-card-user');
        statCards.forEach(card => {
            card.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-5px)';
            });
            
            card.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0)';
            });
        });

        
        const statValues = document.querySelectorAll('.stat-value-user');
        statValues.forEach(valueElement => {
            const originalValue = parseInt(valueElement.textContent);
            let animated = false;
            
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting && !animated) {
                        animated = true;
                        let current = 0;
                        const increment = originalValue / 30;
                        
                        const counter = setInterval(() => {
                            current += increment;
                            if (current >= originalValue) {
                                current = originalValue;
                                clearInterval(counter);
                            }
                            valueElement.textContent = Math.floor(current);
                        }, 30);
                    }
                });
            }, { threshold: 0.5 });
            
            observer.observe(valueElement);
        });
    });

    
    function confirmDelete(event, formElement) {
        event.preventDefault();
        event.stopPropagation();
        
        const userName = formElement.getAttribute('data-user-name') || 'este usuario';
        
        Swal.fire({
            title: '¿Estás seguro?',
            text: `Vas a eliminar al usuario "${userName}". Esta acción no se puede deshacer.`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#EF4444',
            cancelButtonColor: '#6B7280',
            confirmButtonText: 'Sí, eliminar',
            cancelButtonText: 'Cancelar',
            reverseButtons: true,
            backdrop: true,
            allowOutsideClick: false,
            allowEscapeKey: false
        }).then((result) => {
            if (result.isConfirmed) {
                formElement.submit();
            }
        });
        
        return false;
    }

    
    document.addEventListener('DOMContentLoaded', function() {
        const deleteForms = document.querySelectorAll('.delete-form');
        deleteForms.forEach(form => {
            const deleteButton = form.querySelector('.btn-delete-user');
            if (deleteButton) {
                deleteButton.addEventListener('click', function(e) {
                    confirmDelete(e, form);
                });
            }
        });
    });
</script>

<!-- SweetAlert2 para confirmaciones -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


@if(config('app.env') !== 'testing')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[title]'));
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl);
        });
    });
</script>
@endif
@endpush