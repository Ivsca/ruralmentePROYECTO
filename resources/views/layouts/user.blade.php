<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Panel del Usuario - Ruralmente')</title>

    {{-- Google Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    {{-- Iconos --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    @stack('styles')

    <style>
        :root {
            --sidebar-width: 250px;
            --header-height: 70px;
            --primary: #2E8B57;
            --primary-light: #E8F5E9;
            --primary-dark: #1B5E20;
            --success: #10B981;
            --warning: #F59E0B;
            --danger: #EF4444;
            --secondary: #3B82F6;
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
        }

        * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Inter', sans-serif; }

        body {
            background: #f5f7fb;
            min-height: 100vh;
            color: var(--gray-800);
        }

        .dashboard-container { display: flex; min-height: 100vh; }

        /* SIDEBAR SIMPLE */
        .sidebar {
            width: var(--sidebar-width);
            background: white;
            border-right: 1px solid var(--gray-200);
            height: 100vh;
            position: fixed;
            z-index: 99;
        }

        .sidebar-header {
            padding: 1.5rem;
            border-bottom: 1px solid var(--gray-200);
            text-align: center;
        }

        .logo {
            font-size: 1.25rem;
            font-weight: 700;
            color: var(--primary);
            text-decoration: none;
        }

        .sidebar-menu { padding: 1.5rem; }
        
        .menu-item {
            display: flex;
            align-items: center;
            gap: .75rem;
            padding: .75rem 1rem;
            color: var(--gray-700);
            text-decoration: none;
            border-radius: .5rem;
            transition: .2s;
            margin-bottom: 0.5rem;
        }

        .menu-item:hover {
            background: var(--gray-100);
            color: var(--primary);
        }

        .menu-item.active {
            background: var(--primary-light);
            color: var(--primary);
            font-weight: 600;
        }

        .menu-item .badge {
            margin-left: auto;
            background: var(--primary);
            color: white;
            font-size: 0.7rem;
            padding: 0.1rem 0.5rem;
            border-radius: 10px;
        }

        /* MAIN CONTENT */
        .main-content {
            flex: 1;
            margin-left: var(--sidebar-width);
        }

        .top-header {
            height: var(--header-height);
            background: white;
            border-bottom: 1px solid var(--gray-200);
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 2rem;
            position: sticky;
            top: 0;
            z-index: 80;
        }

        .content-wrapper { 
            padding: 2rem; 
            min-height: calc(100vh - var(--header-height));
        }

        /* Responsive */
        @media (max-width: 768px) {
            .sidebar { 
                transform: translateX(-100%);
                width: 250px;
            }
            .main-content { margin-left: 0; }
            .content-wrapper { padding: 1rem; }
        }
    </style>
</head>

<body>

<div class="dashboard-container">

    {{-- SIDEBAR SIMPLE --}}
    <aside class="sidebar">
        <div class="sidebar-header">
            <a href="{{ route('dashboard') }}" class="logo">
                <i class="fas fa-leaf"></i> Ruralmente
            </a>
        </div>

        <nav class="sidebar-menu">
            {{-- Solo las 4 secciones esenciales --}}
            <a href="{{ route('dashboard') }}" 
               class="menu-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                <i class="fas fa-home"></i>
                <span>Dashboard</span>
            </a>

            <a href="{{ route('mis.triajes') }}" 
               class="menu-item {{ request()->routeIs('mis.triajes') ? 'active' : '' }}">
                <i class="fas fa-clipboard-check"></i>
                <span>Mis Triajes</span>
                @if(($triajesPendientes ?? 0) > 0)
                    <span class="badge">{{ $triajesPendientes }}</span>
                @endif
            </a>

            <a href="{{ route('mis-product') }}" 
               class="menu-item {{ request()->routeIs('mis-product') || request()->routeIs('products.*') ? 'active' : '' }}">
                <i class="fas fa-store"></i>
                <span>Productos</span>
            </a>

            <a href="{{ route('checkout') }}" 
               class="menu-item {{ request()->routeIs('checkout') ? 'active' : '' }}">
                <i class="fas fa-shopping-cart"></i>
                <span>Mi Carrito</span>
                @php
                    $carritoCount = 0;
                    if(session('cart')) {
                        $carritoCount = count(session('cart'));
                    }
                @endphp
                @if($carritoCount > 0)
                    <span class="badge">{{ $carritoCount }}</span>
                @endif
            </a>

            {{-- Logout --}}
            <a href="{{ route('logout') }}" class="menu-item"
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
               style="margin-top: 2rem; color: var(--danger);">
                <i class="fas fa-sign-out-alt"></i>
                <span>Cerrar Sesión</span>
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" hidden>
                @csrf
            </form>
        </nav>
    </aside>

    {{-- CONTENIDO PRINCIPAL --}}
    <main class="main-content">
        <header class="top-header">
            <div>
                <h1 style="font-size:1.4rem; font-weight:600;">
                    @yield('page-title', 'Panel del Usuario')
                </h1>
                <p style="color:var(--gray-500); font-size:.85rem;">
                    @yield('page-subtitle', 'Salud mental y productos rurales')
                </p>
            </div>

            <div style="display:flex; align-items:center; gap:1rem;">
                {{-- Carrito siempre visible --}}
                <a href="{{ route('checkout') }}" style="position:relative; text-decoration:none;">
                    <i class="fas fa-shopping-cart" style="font-size:1.2rem; color:var(--gray-600);"></i>
                    @if($carritoCount > 0)
                        <span style="position:absolute; top:-5px; right:-5px; background:var(--primary); color:white; font-size:0.7rem; width:18px; height:18px; border-radius:50%; display:flex; align-items:center; justify-content:center;">
                            {{ $carritoCount }}
                        </span>
                    @endif
                </a>
                
                {{-- Nombre usuario --}}
                <div style="display:flex; flex-direction:column;">
                    <span style="font-weight:600; font-size:0.9rem;">{{ Auth::user()->name }}</span>
                    <span style="font-size:.7rem; color:var(--gray-500);">Usuario</span>
                </div>
            </div>
        </header>

        <div class="content-wrapper">
            @yield('content')
        </div>
    </main>
</div>

@stack('scripts')
</body>
</html>