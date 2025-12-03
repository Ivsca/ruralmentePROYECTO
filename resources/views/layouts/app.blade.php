<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Georgia:wght@400;700&display=swap" rel="stylesheet">
    
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    
    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <!-- Styles -->
    <style>
        /* ===== VARIABLES Y RESET ===== */
        :root {
            --primary-color: #2E8B57;
            --primary-light: #E8F5E9;
            --primary-dark: #1B5E20;
            --secondary-color: #3B82F6;
            --secondary-light: #EFF6FF;
            --danger-color: #EF4444;
            --danger-light: #FEE2E2;
            --warning-color: #F59E0B;
            --warning-light: #FEF3C7;
            --success-color: #10B981;
            --success-light: #D1FAE5;
            --gray-50: #F9FAFB;
            --gray-100: #F3F4F6;
            --gray-200: #E5E7EB;
            --gray-300: #D1D5DB;
            --gray-400: #9CA3AF;
            --gray-500: #6B7280;
            --gray-600: #4B5563;
            --gray-700: #374151;
            --gray-800: #1F2937;
            --gray-900: #111827;
            
            --shadow-sm: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
            --shadow-md: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            --shadow-lg: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
            --shadow-xl: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
            --shadow-2xl: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
            
            --radius-sm: 0.375rem;
            --radius-md: 0.5rem;
            --radius-lg: 0.75rem;
            --radius-xl: 1rem;
            --radius-2xl: 1.5rem;
            --radius-3xl: 2rem;
            
            --transition-fast: 150ms cubic-bezier(0.4, 0, 0.2, 1);
            --transition-base: 300ms cubic-bezier(0.4, 0, 0.2, 1);
            --transition-slow: 500ms cubic-bezier(0.4, 0, 0.2, 1);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
            min-height: 100vh;
            color: var(--gray-800);
            line-height: 1.6;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }

        /* ===== TIPOGRAFÍA ===== */
        h1, h2, h3, h4, h5, h6 {
            font-weight: 700;
            line-height: 1.2;
            color: var(--gray-900);
        }

        .font-serif {
            font-family: 'Georgia', 'Times New Roman', serif;
        }

        h1 {
            font-size: 3.5rem;
        }

        h2 {
            font-size: 2.5rem;
        }

        h3 {
            font-size: 2rem;
        }

        h4 {
            font-size: 1.5rem;
        }

        p {
            margin-bottom: 1rem;
        }

        a {
            color: var(--primary-color);
            text-decoration: none;
            transition: color var(--transition-base);
        }

        a:hover {
            color: var(--primary-dark);
        }

        /* ===== COMPONENTES DEL DASHBOARD ===== */
        
        /* Contenedor principal */
        .dashboard-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 2rem;
        }

        /* Encabezado del dashboard */
        .dashboard-header {
            text-align: center;
            margin-bottom: 4rem;
            padding: 3rem 0;
        }

        .dashboard-title {
            font-size: 3.5rem;
            font-weight: 800;
            color: var(--primary-color);
            margin-bottom: 1rem;
            background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .dashboard-subtitle {
            font-size: 1.25rem;
            color: var(--gray-600);
            font-weight: 400;
            max-width: 600px;
            margin: 0 auto;
        }

        /* Grid de estadísticas */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
            gap: 2rem;
            margin-bottom: 4rem;
        }

        /* Tarjetas de estadísticas */
        .stat-card {
            background: linear-gradient(135deg, #ffffff 0%, var(--gray-50) 100%);
            border: 1px solid var(--gray-200);
            border-radius: var(--radius-2xl);
            padding: 2.5rem;
            box-shadow: var(--shadow-lg);
            transition: all var(--transition-slow);
            position: relative;
            overflow: hidden;
        }

        .stat-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 4px;
            height: 100%;
            background: var(--accent-color, var(--primary-color));
            transition: width var(--transition-slow);
        }

        .stat-card:hover {
            transform: translateY(-8px);
            box-shadow: var(--shadow-2xl);
        }

        .stat-card:hover::before {
            width: 8px;
        }

        .stat-card.product-card {
            --accent-color: var(--success-color);
        }

        .stat-card.user-card {
            --accent-color: var(--secondary-color);
        }

        .stat-card.triage-card {
            --accent-color: var(--danger-color);
        }

        .stat-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 2rem;
        }

        .stat-title {
            font-size: 1.5rem;
            font-weight: 600;
            color: var(--gray-800);
        }

        .stat-icon {
            padding: 1rem;
            background: var(--icon-bg, var(--primary-light));
            border-radius: var(--radius-xl);
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all var(--transition-base);
        }

        .stat-card:hover .stat-icon {
            transform: rotate(15deg) scale(1.1);
        }

        .product-card .stat-icon {
            --icon-bg: var(--success-light);
        }

        .product-card .stat-icon svg {
            color: var(--success-color);
        }

        .user-card .stat-icon {
            --icon-bg: var(--secondary-light);
        }

        .user-card .stat-icon svg {
            color: var(--secondary-color);
        }

        .triage-card .stat-icon {
            --icon-bg: var(--danger-light);
        }

        .triage-card .stat-icon svg {
            color: var(--danger-color);
        }

        .stat-value {
            font-size: 4rem;
            font-weight: 800;
            color: var(--gray-900);
            margin-bottom: 0.5rem;
            line-height: 1;
        }

        .stat-description {
            color: var(--gray-500);
            font-size: 1rem;
            margin-bottom: 1.5rem;
        }

        .stat-footer {
            margin-top: 2rem;
            padding-top: 1.5rem;
            border-top: 1px solid var(--gray-200);
        }

        .stat-link {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            font-weight: 500;
            color: var(--accent-color, var(--primary-color));
            text-decoration: none;
            transition: all var(--transition-base);
        }

        .stat-link:hover {
            gap: 1rem;
        }

        .stat-link svg {
            transition: transform var(--transition-base);
        }

        .stat-link:hover svg {
            transform: translateX(4px);
        }

        /* Contenedor del gráfico */
        .chart-container {
            background: linear-gradient(135deg, #ffffff 0%, var(--gray-50) 100%);
            border: 1px solid var(--gray-200);
            border-radius: var(--radius-2xl);
            padding: 3rem;
            box-shadow: var(--shadow-lg);
            margin-bottom: 4rem;
        }

        .chart-header {
            margin-bottom: 2.5rem;
        }

        .chart-title {
            font-size: 2rem;
            font-weight: 700;
            color: var(--gray-900);
            margin-bottom: 0.5rem;
        }

        .chart-subtitle {
            color: var(--gray-500);
            font-size: 1.125rem;
        }

        .chart-wrapper {
            height: 400px;
            position: relative;
        }

        /* Accesos rápidos */
        .quick-links-section {
            margin-bottom: 4rem;
        }

        .quick-links-header {
            margin-bottom: 2rem;
        }

        .quick-links-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 1.5rem;
        }

        .quick-link-card {
            background: linear-gradient(135deg, #ffffff 0%, var(--gray-50) 100%);
            border: 1px solid var(--gray-200);
            border-radius: var(--radius-xl);
            padding: 2rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            text-decoration: none;
            color: inherit;
            transition: all var(--transition-base);
            position: relative;
            overflow: hidden;
        }

        .quick-link-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 4px;
            background: linear-gradient(90deg, var(--primary-color), var(--primary-dark));
            transform: translateX(-100%);
            transition: transform var(--transition-base);
        }

        .quick-link-card:hover {
            transform: translateY(-4px);
            box-shadow: var(--shadow-xl);
            border-color: var(--primary-light);
        }

        .quick-link-card:hover::before {
            transform: translateX(0);
        }

        .link-content {
            flex: 1;
        }

        .link-title {
            font-size: 1.25rem;
            font-weight: 600;
            color: var(--gray-800);
            margin-bottom: 0.5rem;
        }

        .link-description {
            color: var(--gray-500);
            font-size: 0.875rem;
        }

        .link-arrow {
            color: var(--gray-400);
            transition: all var(--transition-base);
        }

        .quick-link-card:hover .link-arrow {
            color: var(--primary-color);
            transform: translateX(4px);
        }

        /* ===== COMPONENTES PARA LA ADMINISTRACIÓN DE TRIAJES ===== */
        
        /* Filtros */
        .filters-panel {
            background: linear-gradient(135deg, #ffffff 0%, var(--gray-50) 100%);
            border: 1px solid var(--gray-200);
            border-radius: var(--radius-2xl);
            padding: 2.5rem;
            box-shadow: var(--shadow-lg);
            margin-bottom: 3rem;
        }

        .filters-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        .filter-group {
            display: flex;
            flex-direction: column;
        }

        .filter-label {
            font-size: 0.875rem;
            font-weight: 500;
            color: var(--gray-700);
            margin-bottom: 0.5rem;
        }

        .filter-input,
        .filter-select {
            width: 100%;
            padding: 0.875rem 1rem;
            border: 1px solid var(--gray-300);
            border-radius: var(--radius-lg);
            font-size: 1rem;
            color: var(--gray-800);
            background: white;
            transition: all var(--transition-base);
        }

        .filter-input:focus,
        .filter-select:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(46, 139, 87, 0.1);
        }

        .filters-actions {
            display: flex;
            justify-content: flex-end;
            gap: 1rem;
            padding-top: 2rem;
            border-top: 1px solid var(--gray-200);
        }

        .btn {
            padding: 0.875rem 1.75rem;
            border-radius: var(--radius-lg);
            font-weight: 500;
            font-size: 0.875rem;
            cursor: pointer;
            transition: all var(--transition-base);
            border: none;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
        }

        .btn-secondary {
            background: white;
            border: 1px solid var(--gray-300);
            color: var(--gray-700);
        }

        .btn-secondary:hover {
            background: var(--gray-50);
            border-color: var(--gray-400);
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
            color: white;
            border: none;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-md);
        }

        /* Tabla */
        .table-container {
            background: linear-gradient(135deg, #ffffff 0%, var(--gray-50) 100%);
            border: 1px solid var(--gray-200);
            border-radius: var(--radius-2xl);
            box-shadow: var(--shadow-lg);
            overflow: hidden;
            margin-bottom: 3rem;
        }

        .table-header {
            padding: 2rem;
            border-bottom: 1px solid var(--gray-200);
            background: linear-gradient(135deg, var(--gray-50), var(--gray-100));
        }

        .table-title {
            font-size: 1.5rem;
            font-weight: 600;
            color: var(--gray-900);
        }

        .table-subtitle {
            color: var(--gray-500);
            font-size: 0.875rem;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
        }

        .table thead {
            background: linear-gradient(135deg, var(--gray-50), var(--gray-100));
        }

        .table th {
            padding: 1.5rem 2rem;
            text-align: left;
            font-weight: 600;
            color: var(--gray-700);
            font-size: 0.875rem;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            border-bottom: 1px solid var(--gray-200);
        }

        .table tbody tr {
            transition: background-color var(--transition-base);
            border-bottom: 1px solid var(--gray-100);
        }

        .table tbody tr:hover {
            background-color: var(--gray-50);
        }

        .table td {
            padding: 1.5rem 2rem;
            vertical-align: top;
        }

        /* Badges */
        .badge {
            display: inline-flex;
            align-items: center;
            padding: 0.5rem 1rem;
            border-radius: var(--radius-full);
            font-size: 0.75rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        .badge-low {
            background: linear-gradient(135deg, var(--success-light), #E8F5E9);
            color: var(--success-color);
            border: 1px solid var(--success-color);
        }

        .badge-medium {
            background: linear-gradient(135deg, var(--warning-light), #FFF8E1);
            color: var(--warning-color);
            border: 1px solid var(--warning-color);
        }

        .badge-high {
            background: linear-gradient(135deg, var(--danger-light), #FFEBEE);
            color: var(--danger-color);
            border: 1px solid var(--danger-color);
        }

        /* Acciones */
        .actions-group {
            display: flex;
            gap: 0.5rem;
        }

        .btn-action {
            padding: 0.5rem 1rem;
            border-radius: var(--radius-md);
            font-size: 0.75rem;
            font-weight: 500;
            border: none;
            cursor: pointer;
            transition: all var(--transition-base);
            display: inline-flex;
            align-items: center;
            gap: 0.375rem;
        }

        .btn-view {
            background: var(--secondary-light);
            color: var(--secondary-color);
        }

        .btn-view:hover {
            background: var(--secondary-color);
            color: white;
        }

        .btn-edit {
            background: var(--warning-light);
            color: var(--warning-color);
        }

        .btn-edit:hover {
            background: var(--warning-color);
            color: white;
        }

        .btn-delete {
            background: var(--danger-light);
            color: var(--danger-color);
        }

        .btn-delete:hover {
            background: var(--danger-color);
            color: white;
        }

        /* Estados vacíos */
        .empty-state {
            padding: 4rem 2rem;
            text-align: center;
            color: var(--gray-400);
        }

        .empty-state-icon {
            width: 64px;
            height: 64px;
            margin: 0 auto 1.5rem;
            color: var(--gray-300);
        }

        .empty-state-title {
            font-size: 1.25rem;
            font-weight: 600;
            color: var(--gray-500);
            margin-bottom: 0.5rem;
        }

        .empty-state-description {
            color: var(--gray-400);
        }

        /* Paginación */
        .pagination-container {
            padding: 2rem;
            border-top: 1px solid var(--gray-200);
            background: var(--gray-50);
        }

        /* ===== MODALES ===== */
        .modal-overlay {
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, 0.5);
            backdrop-filter: blur(4px);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 9999;
            padding: 1rem;
            animation: fadeIn var(--transition-base);
        }

        .modal-container {
            background: white;
            border-radius: var(--radius-2xl);
            box-shadow: var(--shadow-2xl);
            max-width: 800px;
            width: 100%;
            max-height: 90vh;
            overflow: hidden;
            animation: slideUp var(--transition-base);
        }

        .modal-header {
            padding: 2rem 2.5rem;
            border-bottom: 1px solid var(--gray-200);
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .modal-title {
            font-size: 1.5rem;
            font-weight: 600;
            color: var(--gray-900);
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .modal-content {
            padding: 2.5rem;
            overflow-y: auto;
            max-height: calc(90vh - 140px);
        }

        .modal-actions {
            padding: 1.5rem 2.5rem;
            border-top: 1px solid var(--gray-200);
            display: flex;
            justify-content: flex-end;
            gap: 1rem;
            background: var(--gray-50);
        }

        /* ===== ANIMACIONES ===== */
        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes pulse {
            0%, 100% {
                opacity: 1;
            }
            50% {
                opacity: 0.5;
            }
        }

        /* ===== RESPONSIVE ===== */
        @media (max-width: 768px) {
            .dashboard-container {
                padding: 1rem;
            }

            .dashboard-title {
                font-size: 2.5rem;
            }

            .dashboard-subtitle {
                font-size: 1rem;
            }

            .stats-grid {
                grid-template-columns: 1fr;
            }

            .stat-card {
                padding: 2rem;
            }

            .stat-value {
                font-size: 3rem;
            }

            .chart-container {
                padding: 2rem;
            }

            .chart-wrapper {
                height: 300px;
            }

            .filters-grid {
                grid-template-columns: 1fr;
            }

            .table {
                display: block;
                overflow-x: auto;
            }

            .modal-container {
                width: 95%;
            }

            .modal-header,
            .modal-content,
            .modal-actions {
                padding: 1.5rem;
            }
        }

        @media (max-width: 480px) {
            .dashboard-title {
                font-size: 2rem;
            }

            .stat-card {
                padding: 1.5rem;
            }

            .chart-container {
                padding: 1.5rem;
            }

            .btn {
                padding: 0.75rem 1.25rem;
                font-size: 0.75rem;
            }

            .actions-group {
                flex-direction: column;
                width: 100%;
            }

            .btn-action {
                width: 100%;
                justify-content: center;
            }
        }

        /* ===== UTILIDADES ===== */
        .text-center {
            text-align: center;
        }

        .mt-1 { margin-top: 0.25rem; }
        .mt-2 { margin-top: 0.5rem; }
        .mt-3 { margin-top: 0.75rem; }
        .mt-4 { margin-top: 1rem; }
        .mt-6 { margin-top: 1.5rem; }
        .mt-8 { margin-top: 2rem; }
        .mt-12 { margin-top: 3rem; }

        .mb-1 { margin-bottom: 0.25rem; }
        .mb-2 { margin-bottom: 0.5rem; }
        .mb-3 { margin-bottom: 0.75rem; }
        .mb-4 { margin-bottom: 1rem; }
        .mb-6 { margin-bottom: 1.5rem; }
        .mb-8 { margin-bottom: 2rem; }
        .mb-12 { margin-bottom: 3rem; }

        .gap-1 { gap: 0.25rem; }
        .gap-2 { gap: 0.5rem; }
        .gap-3 { gap: 0.75rem; }
        .gap-4 { gap: 1rem; }
        .gap-6 { gap: 1.5rem; }
        .gap-8 { gap: 2rem; }

        .hidden {
            display: none !important;
        }

        [x-cloak] {
            display: none !important;
        }

        /* ===== SCROLLBAR PERSONALIZADA ===== */
        ::-webkit-scrollbar {
            width: 8px;
            height: 8px;
        }

        ::-webkit-scrollbar-track {
            background: var(--gray-100);
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb {
            background: var(--gray-400);
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: var(--gray-500);
        }

        /* ===== LOADING STATES ===== */
        .loading {
            animation: pulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite;
        }

        /* ===== PRINT STYLES ===== */
        @media print {
            .no-print {
                display: none !important;
            }
            
            body {
                background: white !important;
                color: black !important;
            }
            
            .stat-card,
            .chart-container,
            .table-container {
                box-shadow: none !important;
                border: 1px solid #ddd !important;
                break-inside: avoid;
            }
        }
    </style>

    @stack('styles')
    @livewireStyles
</head>
<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        <!-- Navigation -->
        @if(isset($navigation))
            {{ $navigation }}
        @endif

        <!-- Page Heading -->
        @if(isset($header))
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endif

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
    </div>

    @stack('scripts')
    @livewireScripts
    
    <script>
        // Scripts globales para interactividad
        document.addEventListener('DOMContentLoaded', function() {
            // Inicializar tooltips si se usan
            const tooltips = document.querySelectorAll('[data-tooltip]');
            tooltips.forEach(tooltip => {
                tooltip.addEventListener('mouseenter', function(e) {
                    const text = this.getAttribute('data-tooltip');
                    const tooltipEl = document.createElement('div');
                    tooltipEl.className = 'tooltip';
                    tooltipEl.textContent = text;
                    tooltipEl.style.cssText = `
                        position: absolute;
                        background: var(--gray-900);
                        color: white;
                        padding: 0.5rem 0.75rem;
                        border-radius: var(--radius-sm);
                        font-size: 0.75rem;
                        z-index: 9999;
                        white-space: nowrap;
                        pointer-events: none;
                    `;
                    document.body.appendChild(tooltipEl);
                    
                    const rect = this.getBoundingClientRect();
                    tooltipEl.style.left = rect.left + rect.width/2 - tooltipEl.offsetWidth/2 + 'px';
                    tooltipEl.style.top = rect.top - tooltipEl.offsetHeight - 8 + 'px';
                    
                    this.tooltipElement = tooltipEl;
                });
                
                tooltip.addEventListener('mouseleave', function() {
                    if (this.tooltipElement) {
                        this.tooltipElement.remove();
                    }
                });
            });

            // Manejar modales con Alpine.js
            window.Alpine = Alpine;
            
            // Manejar SweetAlert2 si existe
            if (typeof Swal !== 'undefined') {
                window.Swal = Swal;
            }

            // Inicializar Chart.js si hay gráficos
            if (typeof Chart !== 'undefined') {
                window.Chart = Chart;
            }
        });

        // Función para copiar al portapapeles
        window.copyToClipboard = function(text) {
            navigator.clipboard.writeText(text).then(() => {
                if (typeof Swal !== 'undefined') {
                    Swal.fire({
                        icon: 'success',
                        title: 'Copiado',
                        text: 'Texto copiado al portapapeles',
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 2000
                    });
                }
            });
        };
    </script>
</body>
</html>