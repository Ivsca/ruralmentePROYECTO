@extends('layouts.admin')

@section('page-title', 'Gestión de Productos')
@section('page-subtitle', 'Administra el catálogo de productos rurales')

@push('styles')
<style>
/* =========================================================
   1) BASE / ANTI-OVERFLOW (evita scroll horizontal del body)
   ========================================================= */
html, body { overflow-x: hidden; }

.main-content,
.content-wrapper,
.products-admin-container {
  min-width: 0;
  overflow-x: hidden;
}

/* =========================================================
   2) LAYOUT PRINCIPAL
   ========================================================= */
.products-admin-container {
  max-width: 1400px;
  margin: 0 auto;
  padding: 2rem 1rem;
}

/* Header */
.page-header-products {
  margin-bottom: 2.5rem;
  padding-bottom: 1.5rem;
  border-bottom: 2px solid rgba(46, 139, 87, 0.1);
}

.page-title-products { min-width: 0; }

.page-title-products h1 {
  color: var(--text-primary);
  font-size: 1.8rem;
  font-weight: 700;
  margin-bottom: 0.5rem;
  display: flex;
  align-items: center;
  gap: 0.75rem;
  flex-wrap: wrap;
}

.page-title-products h1 i {
  color: var(--primary-green);
  font-size: 1.6rem;
}

.page-subtitle-products {
  color: var(--text-light);
  font-size: 0.95rem;
  margin-top: 0.25rem;
}

/* Botón principal */
.add-product-btn {
  display: inline-flex;
  align-items: center;
  gap: 0.5rem;
  padding: 0.85rem 1.75rem;
  background: var(--green-gradient);
  color: white;
  border-radius: var(--radius-full);
  text-decoration: none;
  font-weight: 600;
  font-size: 0.95rem;
  transition: var(--transition-smooth);
  box-shadow: 0 4px 12px rgba(46, 139, 87, 0.2);
}

.add-product-btn:hover {
  transform: translateY(-2px) scale(1.05);
  box-shadow: 0 6px 16px rgba(46, 139, 87, 0.3);
  color: white;
}

/* Mensaje éxito */
.alert-success {
  background: linear-gradient(135deg, rgba(16, 185, 129, 0.1) 0%, rgba(255, 255, 255, 1) 100%);
  border: 1px solid rgba(16, 185, 129, 0.2);
  border-left: 4px solid #10B981;
  border-radius: var(--radius-md);
  padding: 1rem 1.5rem;
  color: #059669;
  font-size: 0.95rem;
  margin-bottom: 2rem;
  display: flex;
  align-items: center;
  gap: 0.75rem;
  box-shadow: var(--shadow-sm);
}

.alert-success i { font-size: 1.1rem; }

/* =========================================================
   3) FILTROS
   ========================================================= */
.filters-container {
  background: var(--bg-card);
  border-radius: var(--radius-xl);
  padding: 1.5rem;
  border: 1px solid rgba(46, 139, 87, 0.1);
  box-shadow: var(--shadow-md);
  margin-bottom: 2rem;
}

.filters-header {
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin-bottom: 1.5rem;
  padding-bottom: 1rem;
  border-bottom: 1px solid rgba(46, 139, 87, 0.1);
}

.filters-title {
  font-size: 1.1rem;
  font-weight: 600;
  color: var(--text-primary);
  display: flex;
  align-items: center;
  gap: 0.5rem;
}

.filters-title i { color: var(--primary-green); }

.filters-form {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
  gap: 1rem;
  margin-bottom: 1.5rem;
}

.filter-group {
  display: flex;
  flex-direction: column;
  gap: 0.5rem;
}

.filter-label {
  font-size: 0.85rem;
  font-weight: 600;
  color: var(--text-light);
  display: flex;
  align-items: center;
  gap: 0.5rem;
}

.filter-label i {
  color: var(--primary-green);
  font-size: 0.8rem;
}

.filter-input,
.filter-select {
  width: 100%;
  padding: 0.75rem 1rem;
  border: 2px solid rgba(46, 139, 87, 0.1);
  border-radius: var(--radius-md);
  background: white;
  color: var(--text-primary);
  font-size: 0.9rem;
  transition: var(--transition-smooth);
}

.filter-input:focus,
.filter-select:focus {
  outline: none;
  border-color: var(--primary-green);
  box-shadow: 0 0 0 3px rgba(46, 139, 87, 0.1);
}

.filter-input::placeholder { color: var(--text-light); }

.filter-actions {
  grid-column: 1 / -1;
  display: flex;
  gap: 1rem;
  justify-content: flex-end;
  padding-top: 1rem;
  border-top: 1px solid rgba(46, 139, 87, 0.1);
}

.btn-search,
.btn-clear {
  padding: 0.75rem 1.5rem;
  border-radius: var(--radius-full);
  font-weight: 600;
  font-size: 0.9rem;
  transition: var(--transition-smooth);
  border: none;
  cursor: pointer;
  display: flex;
  align-items: center;
  gap: 0.5rem;
}

.btn-search {
  background: var(--green-gradient);
  color: white;
  box-shadow: var(--shadow-sm);
}

.btn-search:hover {
  transform: translateY(-2px);
  box-shadow: var(--shadow-md);
}

.btn-clear {
  background: var(--bg-card);
  color: var(--text-secondary);
  border: 1px solid rgba(46, 139, 87, 0.2);
}

.btn-clear:hover {
  background: rgba(46, 139, 87, 0.05);
  color: var(--primary-green);
  border-color: var(--primary-green);
  transform: translateY(-2px);
}

/* =========================================================
   4) TABLA
   (Modo SIN scroll horizontal: fixed layout + ellipsis + ocultar columnas)
   ========================================================= */
.table-container {
  background: var(--bg-card);
  border-radius: var(--radius-xl);
  overflow: hidden;
  box-shadow: var(--shadow-md);
  border: 1px solid rgba(46, 139, 87, 0.1);
  margin-bottom: 2rem;
}

/* IMPORTANT: no queremos scroll horizontal en esta vista */
.table-responsive {
  overflow-x: hidden;
  -webkit-overflow-scrolling: touch;
}

.products-table {
  width: 100%;
  max-width: 100%;
  border-collapse: separate;
  border-spacing: 0;
  min-width: 0 !important;
  table-layout: fixed;
}

.products-table thead {
  background: linear-gradient(135deg, rgba(46, 139, 87, 0.05) 0%, rgba(60, 179, 113, 0.1) 100%);
}

.products-table th {
  padding: 1.25rem 1rem;
  text-align: left;
  color: var(--primary-green);
  font-weight: 600;
  font-size: 0.85rem;
  text-transform: uppercase;
  letter-spacing: 0.05em;
  border-bottom: 2px solid rgba(46, 139, 87, 0.1);
  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
}

.products-table th:first-child {
  border-top-left-radius: var(--radius-lg);
  padding-left: 1.5rem;
}

.products-table th:last-child {
  border-top-right-radius: var(--radius-lg);
  padding-right: 1.5rem;
}

.products-table td {
  padding: 1.25rem 1rem;
  color: var(--text-secondary);
  border-bottom: 1px solid rgba(46, 139, 87, 0.08);
  vertical-align: middle;
  font-size: 0.9rem;
  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
}

.products-table td:first-child {
  padding-left: 1.5rem;
  font-weight: 600;
  color: var(--text-primary);
}

.products-table td:last-child { padding-right: 1.5rem; }

.products-table tbody tr { transition: var(--transition-smooth); }

.products-table tbody tr:hover {
  background: linear-gradient(90deg, rgba(46, 139, 87, 0.02) 0%, rgba(255, 255, 255, 0) 100%);
}

.products-table tbody tr:last-child td { border-bottom: none; }

/* Descripción (col 4): permitir 2 líneas y no empujar ancho */
.products-table td:nth-child(4){
  white-space: normal;
  display: -webkit-box;
  -webkit-line-clamp: 2;
  -webkit-box-orient: vertical;
}

/* Badges */
.category-badge {
  display: inline-flex;
  align-items: center;
  gap: 0.5rem;
  padding: 0.4rem 0.875rem;
  border-radius: var(--radius-full);
  font-size: 0.75rem;
  font-weight: 600;
  background: linear-gradient(135deg, rgba(79, 195, 247, 0.1) 0%, rgba(41, 182, 246, 0.2) 100%);
  color: var(--sky-blue);
  border: 1px solid rgba(79, 195, 247, 0.2);
}

.status-badge {
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
  background: linear-gradient(135deg, rgba(156, 163, 175, 0.1) 0%, rgba(156, 163, 175, 0.2) 100%);
  color: #6B7280;
  border: 1px solid rgba(156, 163, 175, 0.2);
}

.price-cell {
  font-weight: 700;
  color: var(--primary-green);
  font-family: 'Poppins', sans-serif;
}

/* Acciones */
.table-actions {
  display: flex;
  gap: 0.5rem;
  justify-content: center;
}

.btn-action {
  display: inline-flex;
  align-items: center;
  justify-content: center;
  padding: 0.5rem 1rem;
  border-radius: var(--radius-md);
  text-decoration: none;
  font-size: 0.85rem;
  font-weight: 500;
  transition: var(--transition-smooth);
  border: none;
  cursor: pointer;
  min-width: 80px;
}

.btn-edit {
  background: linear-gradient(135deg, rgba(245, 158, 11, 0.1) 0%, rgba(245, 158, 11, 0.2) 100%);
  color: #F59E0B;
  border: 1px solid rgba(245, 158, 11, 0.2);
}

.btn-edit:hover {
  background: linear-gradient(135deg, #F59E0B 0%, #D97706 100%);
  color: white;
  transform: translateY(-2px);
  box-shadow: 0 4px 8px rgba(245, 158, 11, 0.3);
}

.btn-delete {
  background: linear-gradient(135deg, rgba(239, 68, 68, 0.1) 0%, rgba(239, 68, 68, 0.2) 100%);
  color: #EF4444;
  border: 1px solid rgba(239, 68, 68, 0.2);
}

.btn-delete:hover {
  background: linear-gradient(135deg, #EF4444 0%, #DC2626 100%);
  color: white;
  transform: translateY(-2px);
  box-shadow: 0 4px 8px rgba(239, 68, 68, 0.3);
}

/* Estado vacío */
.empty-table {
  text-align: center;
  padding: 4rem 2rem;
  background: var(--bg-card);
}

.empty-icon {
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
  box-shadow: var(--shadow-sm);
}

.empty-table h4 {
  color: var(--text-primary);
  margin-bottom: 0.75rem;
  font-size: 1.25rem;
  font-weight: 600;
}

.empty-table p {
  color: var(--text-light);
  margin-bottom: 1.5rem;
  max-width: 400px;
  margin-left: auto;
  margin-right: auto;
}

/* =========================================================
   5) FOOTER + PAGINACIÓN (espaciado como en tu screenshot)
   ========================================================= */
.table-footer {
  display: flex;
  justify-content: space-between;
  align-items: flex-start;
  gap: 1.25rem;
  padding: 1.5rem;
  background: linear-gradient(90deg, rgba(46, 139, 87, 0.03) 0%, rgba(255, 255, 255, 0) 100%);
  border-top: 1px solid rgba(46, 139, 87, 0.1);
}

.table-stats {
  color: var(--text-light);
  font-size: 0.9rem;
  display: flex;
  align-items: center;
  gap: 0.5rem;
  line-height: 1.2;
}

.table-stats i {
  color: var(--primary-green);
  font-size: 0.8rem;
}

.pagination-container {
  display: flex;
  justify-content: flex-end;
}

/* El paginador bootstrap trae <nav> con <p> (Showing...) y <ul> */
.pagination-container nav{
  display: flex;
  flex-direction: column;
  align-items: flex-end;
  gap: 0.65rem;
}

.pagination-container nav p{
  margin: 0;
  line-height: 1.2;
  font-size: 0.9rem;
  color: var(--text-light);
}

.pagination-container .pagination {
  display: flex;
  justify-content: flex-end;
  list-style: none;
  padding: 0;
  margin: 0;
  gap: 0.65rem;
  flex-wrap: wrap;
}

.pagination-container .page-link,
.pagination-container .page-item.disabled .page-link,
.pagination-container .page-item.active .page-link {
  display: inline-flex;
  align-items: center;
  justify-content: center;
  min-width: 42px;
  height: 42px;
  padding: 0 0.9rem;
  border-radius: var(--radius-md);
  text-decoration: none;
  font-weight: 500;
  transition: var(--transition-smooth);
  border: 1px solid rgba(46, 139, 87, 0.1);
  background: var(--bg-card);
  color: var(--text-secondary);
  margin: 0 !important;
  white-space: nowrap;
}

.pagination-container .page-link:hover {
  background: rgba(46, 139, 87, 0.1);
  color: var(--primary-green);
  transform: translateY(-2px);
  border-color: var(--primary-green);
  box-shadow: var(--shadow-sm);
}

.pagination-container .page-item.active .page-link {
  background: var(--green-gradient);
  color: white;
  border-color: var(--primary-green);
  box-shadow: 0 4px 8px rgba(46, 139, 87, 0.2);
  transform: translateY(-2px);
}

.pagination-container .page-item.disabled .page-link {
  color: var(--text-light);
  opacity: 0.5;
  cursor: not-allowed;
}

/* =========================================================
   6) RESPONSIVE
   ========================================================= */

/* Tablets/Down */
@media (max-width: 1024px) {
  .filters-form { grid-template-columns: repeat(2, 1fr); }
}

/* Mobile */
@media (max-width: 768px) {
  .products-admin-container { padding: 1rem; }

  .page-header-products{
    display: flex;
    flex-direction: column;
    gap: 1.5rem;
    text-align: center;
  }

  .filters-form { grid-template-columns: 1fr; }

  .filter-actions{
    flex-direction: column;
  }

  .btn-search, .btn-clear{
    width: 100%;
    justify-content: center;
  }

  .table-footer{
    flex-direction: column;
    align-items: stretch;
    text-align: center;
  }

  .pagination-container nav{
    align-items: center;
  }
}

/* Very small */
@media (max-width: 480px) {
  .page-title-products h1 { font-size: 1.5rem; }

  .add-product-btn{
    width: 100%;
    justify-content: center;
  }

  .filters-container { padding: 1rem; }
}

/* =========================================================
   7) RESPONSIVE PC PANTALLA PEQUEÑA + SIDEBAR COMPLETO
   (sin scroll horizontal: ocultar columnas secundarias)
   ========================================================= */
@media (max-width: 1400px) {
  .sidebar:not(.collapsed) ~ .main-content .products-table th:nth-child(3),
  .sidebar:not(.collapsed) ~ .main-content .products-table td:nth-child(3),  /* Título */
  .sidebar:not(.collapsed) ~ .main-content .products-table th:nth-child(4),
  .sidebar:not(.collapsed) ~ .main-content .products-table td:nth-child(4),  /* Descripción */
  .sidebar:not(.collapsed) ~ .main-content .products-table th:nth-child(7),
  .sidebar:not(.collapsed) ~ .main-content .products-table td:nth-child(7),  /* Color */
  .sidebar:not(.collapsed) ~ .main-content .products-table th:nth-child(10),
  .sidebar:not(.collapsed) ~ .main-content .products-table td:nth-child(10)  /* Creado */
  {
    display: none;
  }

  .sidebar:not(.collapsed) ~ .main-content .products-admin-container{
    max-width: 1200px;
    padding: 1.25rem 1rem;
  }

  .sidebar:not(.collapsed) ~ .main-content .page-header-products{
    display: flex;
    align-items: flex-start;
    justify-content: space-between;
    gap: 1rem;
    margin-bottom: 1.5rem;
    padding-bottom: 1rem;
  }

  .sidebar:not(.collapsed) ~ .main-content .page-title-products h1{ font-size: 1.5rem; }
  .sidebar:not(.collapsed) ~ .main-content .page-subtitle-products{ font-size: 0.9rem; }

  .sidebar:not(.collapsed) ~ .main-content .add-product-btn{
    padding: 0.7rem 1.1rem;
    font-size: 0.9rem;
    white-space: nowrap;
  }

  .sidebar:not(.collapsed) ~ .main-content .filters-container{
    padding: 1.1rem;
    margin-bottom: 1.25rem;
  }

  .sidebar:not(.collapsed) ~ .main-content .filters-form{
    grid-template-columns: repeat(3, minmax(180px, 1fr));
    gap: 0.85rem;
    margin-bottom: 1rem;
  }

  .sidebar:not(.collapsed) ~ .main-content .filter-input,
  .sidebar:not(.collapsed) ~ .main-content .filter-select{
    padding: 0.65rem 0.9rem;
    font-size: 0.88rem;
  }

  .sidebar:not(.collapsed) ~ .main-content .btn-search,
  .sidebar:not(.collapsed) ~ .main-content .btn-clear{
    padding: 0.65rem 1.1rem;
    font-size: 0.88rem;
  }

  .sidebar:not(.collapsed) ~ .main-content .btn-action{
    min-width: 44px;
    padding: 0.55rem 0.65rem;
    font-size: 0.85rem;
  }

  /* Si usas <span class="btn-text">Editar</span> */
  .sidebar:not(.collapsed) ~ .main-content .btn-text{ display: none; }
}

/* Cuando el ancho baja más, reduce filtros */
@media (max-width: 1180px) {
  .filters-form{
    grid-template-columns: repeat(2, minmax(180px, 1fr));
  }
}

/* Si la altura es baja */
@media (max-height: 780px) {
  .products-admin-container{
    padding-top: 1rem;
    padding-bottom: 1rem;
  }
}

/* =========================================================
   TABLA MÁS PEQUEÑA EN PC DE PANTALLA PEQUEÑA
   ========================================================= */

/* Compactar tabla en laptops / pantallas pequeñas */
@media (max-width: 1366px) {
  .products-table th { padding: 0.75rem 0.6rem; font-size: 0.75rem; }
  .products-table td { padding: 0.75rem 0.6rem; font-size: 0.84rem; }

  .products-table th:first-child,
  .products-table td:first-child { padding-left: 1rem; }

  .products-table th:last-child,
  .products-table td:last-child { padding-right: 1rem; }

  .category-badge,
  .status-badge { padding: 0.3rem 0.6rem; font-size: 0.72rem; }

  .table-actions { gap: 0.35rem; }
  .btn-action { min-width: 40px; padding: 0.45rem 0.55rem; font-size: 0.8rem; }
}

/* Column widths para que NADA se "corte raro" (fixed layout) */
.products-table { table-layout: fixed; }
.products-table th:nth-child(1),  .products-table td:nth-child(1)  { width: 48px; }   /* # */
.products-table th:nth-child(2),  .products-table td:nth-child(2)  { width: 200px; }  /* Nombre */
.products-table th:nth-child(5),  .products-table td:nth-child(5)  { width: 110px; }  /* Precio */
.products-table th:nth-child(6),  .products-table td:nth-child(6)  { width: 90px; }   /* Stock */
.products-table th:nth-child(8),  .products-table td:nth-child(8)  { width: 120px; }  /* Categoría */
.products-table th:nth-child(9),  .products-table td:nth-child(9)  { width: 110px; }  /* Estado */
.products-table th:nth-child(11), .products-table td:nth-child(11) { width: 170px; }  /* Acciones */

/* Si el sidebar está COMPLETO en pantallas pequeñas: ocultar SOLO columnas secundarias */
@media (max-width: 1366px) {
  .sidebar:not(.collapsed) ~ .main-content .products-table th:nth-child(3),
  .sidebar:not(.collapsed) ~ .main-content .products-table td:nth-child(3),  /* Título */
  .sidebar:not(.collapsed) ~ .main-content .products-table th:nth-child(4),
  .sidebar:not(.collapsed) ~ .main-content .products-table td:nth-child(4),  /* Descripción */
  .sidebar:not(.collapsed) ~ .main-content .products-table th:nth-child(7),
  .sidebar:not(.collapsed) ~ .main-content .products-table td:nth-child(7),  /* Color */
  .sidebar:not(.collapsed) ~ .main-content .products-table th:nth-child(10),
  .sidebar:not(.collapsed) ~ .main-content .products-table td:nth-child(10)  /* Creado */
  { display: none; }

  /* Acciones en 1 fila y más compactas */
  .sidebar:not(.collapsed) ~ .main-content .table-actions {
    flex-direction: row;
    flex-wrap: nowrap;
  }
}

/* Si baja aún más (ej: 1280px), ocultar también Categoría para que quepa perfecto */
@media (max-width: 1280px) {
  .sidebar:not(.collapsed) ~ .main-content .products-table th:nth-child(8),
  .sidebar:not(.collapsed) ~ .main-content .products-table td:nth-child(8) {
    display: none; /* Categoría */
  }

  /* Dar más espacio a Nombre */
  .products-table th:nth-child(2), .products-table td:nth-child(2) { width: 240px; }
}

</style>

@endpush

@section('content')

<div class="products-admin-container">
    
    <!-- ENCABEZADO -->
    <div class="page-header-products">
        <div class="page-title-products">
            <h1>
                <i class="fas fa-boxes"></i> Gestión de Productos
            </h1>
            <p class="page-subtitle-products">
                Administra el catálogo completo de productos rurales
            </p>
        </div>

        <a href="{{ route('admin.crearProducto') }}" class="add-product-btn">
            <i class="fas fa-plus-circle"></i>
            Nuevo Producto
        </a>
    </div>

    <!-- MENSAJE DE ÉXITO -->
    @if(session('success'))
        <div class="alert-success">
            <i class="fas fa-check-circle"></i>
            {{ session('success') }}
        </div>
    @endif

    <!-- FILTROS MEJORADOS -->
    <div class="filters-container">
        <div class="filters-header">
            <h3 class="filters-title">
                <i class="fas fa-filter"></i>
                Filtros de Búsqueda
            </h3>
        </div>

        <form action="{{ route('admin.Tabla-productos') }}" method="GET" class="filters-form">
            <!-- Búsqueda general -->
            <div class="filter-group">
                <label class="filter-label">
                    <i class="fas fa-search"></i>
                    Buscar
                </label>
                <input 
                    type="text" 
                    name="q" 
                    value="{{ request('q') }}" 
                    class="filter-input" 
                    placeholder="Nombre, título, descripción..."
                >
            </div>

            <!-- Categoría -->
            <div class="filter-group">
                <label class="filter-label">
                    <i class="fas fa-tag"></i>
                    Categoría
                </label>
                <select name="category" class="filter-select">
                    <option value="">Todas las categorías</option>
                    @foreach($categories as $cat)
                        <option value="{{ $cat }}" {{ request('category') === $cat ? 'selected' : '' }}>
                            {{ ucfirst($cat) }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Estado -->
            <div class="filter-group">
                <label class="filter-label">
                    <i class="fas fa-circle"></i>
                    Estado
                </label>
                <select name="status" class="filter-select">
                    <option value="">Todos los estados</option>
                    <option value="activo" {{ request('status') === 'activo' ? 'selected' : '' }}>Activo</option>
                    <option value="inactivo" {{ request('status') === 'inactivo' ? 'selected' : '' }}>Inactivo</option>
                </select>
            </div>

            <!-- Precio -->
            <div class="filter-group">
                <label class="filter-label">
                    <i class="fas fa-dollar-sign"></i>
                    Precio Mínimo
                </label>
                <input 
                    type="number" 
                    name="price_min" 
                    value="{{ request('price_min') }}" 
                    class="filter-input" 
                    placeholder="0.00"
                    step="0.01"
                    min="0"
                >
            </div>

            <div class="filter-group">
                <label class="filter-label">
                    <i class="fas fa-dollar-sign"></i>
                    Precio Máximo
                </label>
                <input 
                    type="number" 
                    name="price_max" 
                    value="{{ request('price_max') }}" 
                    class="filter-input" 
                    placeholder="9999.99"
                    step="0.01"
                    min="0"
                >
            </div>

            <!-- Stock -->
            <div class="filter-group">
                <label class="filter-label">
                    <i class="fas fa-box"></i>
                    Stock Mínimo
                </label>
                <input 
                    type="number" 
                    name="stock_min" 
                    value="{{ request('stock_min') }}" 
                    class="filter-input" 
                    placeholder="0"
                    min="0"
                >
            </div>

            <div class="filter-group">
                <label class="filter-label">
                    <i class="fas fa-boxes"></i>
                    Stock Máximo
                </label>
                <input 
                    type="number" 
                    name="stock_max" 
                    value="{{ request('stock_max') }}" 
                    class="filter-input" 
                    placeholder="9999"
                    min="0"
                >
            </div>

            <!-- Acciones -->
            <div class="filter-actions">
                <button type="submit" class="btn-search">
                    <i class="fas fa-search"></i>
                    Buscar Productos
                </button>
                
                @if(request()->anyFilled(['q','category','status','price_min','price_max','stock_min','stock_max']))
                    <a href="{{ route('admin.Tabla-productos') }}" class="btn-clear">
                        <i class="fas fa-times-circle"></i>
                        Limpiar Filtros
                    </a>
                @endif
            </div>
        </form>
    </div>

    <!-- TABLA DE PRODUCTOS -->
    <div class="table-container">
        <div class="table-responsive">
            <table class="products-table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Título</th>
                        <th>Descripción</th>
                        <th>Precio</th>
                        <th>Stock</th>
                        <th>Color</th>
                        <th>Categoría</th>
                        <th>Estado</th>
                        <th>Creado</th>
                        <th class="text-center">Acciones</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($products as $product)
                        <tr>
                            <td>{{ $products->firstItem() + $loop->index }}</td>
                            
                            <td>
                                <div style="font-weight: 600; color: var(--text-primary); margin-bottom: 0.25rem;">
                                    {{ $product->name }}
                                </div>
                            </td>
                            
                            <td>{{ $product->title }}</td>
                            
                            <td>
                                <div style="color: var(--text-secondary); font-size: 0.85rem; max-width: 180px;">
                                    {{ \Illuminate\Support\Str::limit($product->description, 40) }}
                                </div>
                            </td>
                            
                            <td class="price-cell">
                                ${{ number_format($product->price, 2) }}
                            </td>
                            
                            <td>
                                <div style="font-weight: 600; color: var(--text-primary);">
                                    {{ $product->stock }}
                                </div>
                                @if($product->stock <= 5)
                                    <div style="font-size: 0.75rem; color: #EF4444;">
                                        <i class="fas fa-exclamation-triangle"></i> Stock bajo
                                    </div>
                                @endif
                            </td>
                            
                            <td>{{ $product->color }}</td>
                            
                            <td>
                                <span class="category-badge">
                                    {{ $product->category }}
                                </span>
                            </td>
                            
                            <td>
                                <span class="status-badge {{ $product->status === 'activo' ? 'status-active' : 'status-inactive' }}">
                                    <i class="fas fa-circle" style="font-size: 0.6rem;"></i>
                                    {{ $product->status }}
                                </span>
                            </td>
                            
                            <td>
                                <div style="font-size: 0.85rem; color: var(--text-primary);">
                                    {{ optional($product->created_at)->format('Y-m-d') }}
                                </div>
                            </td>
                            
                            <td>
                                <div class="table-actions">
                                    <a href="{{ route('admin.products.edit', $product->id) }}" class="btn-action btn-edit" title="Editar">
                                        <i class="fas fa-edit"></i>
                                        <span class="btn-text">Editar</span>
                                    </a>
                                    
                                    <form 
                                        action="{{ route('admin.products.destroy', $product->id) }}" 
                                        method="POST" 
                                        class="d-inline delete-form"
                                        data-product-name="{{ $product->name }}"
                                    >
                                        @csrf
                                        @method('DELETE')
                                        <button 
                                            type="button" 
                                            class="btn-action btn-delete"
                                            title="Eliminar"
                                            onclick="confirmDeleteProduct(event, this.closest('form'))"
                                        >
                                            <i class="fas fa-trash-alt"></i>
                                            <span class="btn-text">Eliminar</span>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="11">
                                <div class="empty-table">
                                    <div class="empty-icon">
                                        <i class="fas fa-box-open"></i>
                                    </div>
                                    <h4>No se encontraron productos</h4>
                                    <p>
                                        @if(request()->anyFilled(['q','category','status','price_min','price_max','stock_min','stock_max']))
                                            No hay productos que coincidan con los filtros aplicados.
                                        @else
                                            El catálogo de productos está vacío. Comienza agregando un nuevo producto.
                                        @endif
                                    </p>
                                    <a href="{{ route('admin.crearProducto') }}" class="add-product-btn">
                                        <i class="fas fa-plus-circle"></i>
                                        Agregar Primer Producto
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- PIE DE TABLA -->
        @if($products->count() > 0)
            <div class="table-footer">
                <div class="table-stats">
                    <i class="fas fa-chart-bar"></i>
                    Mostrando {{ $products->firstItem() ?? 0 }} - {{ $products->lastItem() ?? 0 }} de {{ $products->total() }} productos
                </div>
                
                <div class="pagination-container">
                    {{ $products->links('pagination::bootstrap-5') }}
                </div>
            </div>
        @endif
    </div>
</div>

@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Efectos en filas de tabla
        const tableRows = document.querySelectorAll('.products-table tbody tr');
        tableRows.forEach(row => {
            row.addEventListener('mouseenter', function() {
                this.style.transform = 'translateX(5px)';
            });
            
            row.addEventListener('mouseleave', function() {
                this.style.transform = 'translateX(0)';
            });
        });

        // Efectos en botones
        const actionButtons = document.querySelectorAll('.btn-action');
        actionButtons.forEach(button => {
            button.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-2px)';
            });
            
            button.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0)';
            });
        });

        // Efectos en filtros
        const filterInputs = document.querySelectorAll('.filter-input, .filter-select');
        filterInputs.forEach(input => {
            input.addEventListener('focus', function() {
                this.parentElement.style.transform = 'translateY(-2px)';
            });
            
            input.addEventListener('blur', function() {
                this.parentElement.style.transform = 'translateY(0)';
            });
        });
    });

    // Función para confirmar eliminación
    function confirmDeleteProduct(event, formElement) {
        event.preventDefault();
        event.stopPropagation();
        
        const productName = formElement.getAttribute('data-product-name') || 'este producto';
        
        Swal.fire({
            title: '¿Eliminar Producto?',
            html: `
                <div style="text-align: center;">
                    <div style="font-size: 4rem; color: #EF4444; margin-bottom: 1rem;">
                        <i class="fas fa-exclamation-triangle"></i>
                    </div>
                    <p style="margin-bottom: 1rem;">
                        <strong>¿Estás seguro de eliminar "${productName}"?</strong>
                    </p>
                    <p style="color: #6B7280; font-size: 0.9rem; margin-bottom: 1.5rem;">
                        Esta acción eliminará permanentemente el producto del catálogo.
                        <br>
                        <strong>Esta acción no se puede deshacer.</strong>
                    </p>
                </div>
            `,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#EF4444',
            cancelButtonColor: '#6B7280',
            confirmButtonText: 'Sí, eliminar',
            cancelButtonText: 'Cancelar',
            reverseButtons: true,
            backdrop: true,
            allowOutsideClick: false,
            allowEscapeKey: false,
            width: '500px'
        }).then((result) => {
            if (result.isConfirmed) {
                // Mostrar carga
                Swal.fire({
                    title: 'Eliminando producto...',
                    text: 'Por favor espera',
                    allowOutsideClick: false,
                    allowEscapeKey: false,
                    didOpen: () => {
                        Swal.showLoading();
                    }
                });
                
                // Enviar formulario
                formElement.submit();
            }
        });
    }

    // Agregar confirmación a todos los botones de eliminar
    const deleteButtons = document.querySelectorAll('.btn-delete');
    deleteButtons.forEach(button => {
        if (!button.hasAttribute('onclick')) {
            button.addEventListener('click', function(e) {
                const form = this.closest('form');
                confirmDeleteProduct(e, form);
            });
        }
    });
</script>

<!-- SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
@endpush