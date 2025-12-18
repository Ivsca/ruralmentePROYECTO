<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Panel del Usuario - Ruralmente')</title>

    {{-- Google Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    {{-- Iconos --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    @stack('styles')

    <style>
        :root {
            --sidebar-width: 260px;
            --header-height: 80px;
            
            
            --primary-green: #2E8B57;
            --green-light: #3CB371;
            --green-gradient: linear-gradient(135deg, #3CB371 0%, #2E8B57 100%);
            --green-gradient-light: linear-gradient(135deg, #48C78E 0%, #3CB371 100%);
            
            --sky-blue: #4FC3F7;
            --sky-blue-dark: #29B6F6;
            --sky-gradient: linear-gradient(135deg, #4FC3F7 0%, #29B6F6 100%);
            
            --earth-brown: #8D6E63;
            --earth-light: #A1887F;
            --earth-gradient: linear-gradient(135deg, #A1887F 0%, #8D6E63 100%);
            
            --warm-orange: #FFA726;
            --warm-yellow: #FFCA28;
            --warm-gradient: linear-gradient(135deg, #FFCA28 0%, #FFA726 100%);
            
            --danger: #EF4444;
            --danger-light: rgba(239, 68, 68, 0.1);
            
            
            --bg-primary: #F8FAF7;
            --bg-sidebar: linear-gradient(180deg, #FFFFFF 0%, #F8FAF7 100%);
            --bg-card: #FFFFFF;
            --text-primary: #2D3748;
            --text-secondary: #4A5568;
            --text-light: #718096;
            
            
            --shadow-sm: 0 2px 8px rgba(46, 139, 87, 0.08);
            --shadow-md: 0 4px 12px rgba(46, 139, 87, 0.12);
            --shadow-lg: 0 8px 24px rgba(46, 139, 87, 0.16);
            
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
            
            
            --radius-sm: 8px;
            --radius-md: 12px;
            --radius-lg: 16px;
            --radius-xl: 20px;
            --radius-full: 999px;
        }

        * { 
            margin: 0; 
            padding: 0; 
            box-sizing: border-box; 
            font-family: 'Inter', 'Poppins', sans-serif; 
        }

        body {
            background: var(--bg-primary);
            min-height: 100vh;
            color: var(--text-primary);
            background-image: 
                radial-gradient(at 10% 20%, rgba(46, 139, 87, 0.05) 0px, transparent 50%),
                radial-gradient(at 90% 10%, rgba(76, 175, 80, 0.05) 0px, transparent 50%);
        }

        .dashboard-container { 
            display: flex; 
            min-height: 100vh; 
        }

        
        .sidebar {
            width: var(--sidebar-width);
            background: var(--bg-sidebar);
            border-right: 1px solid rgba(46, 139, 87, 0.1);
            height: 100vh;
            position: fixed;
            z-index: 99;
            box-shadow: var(--shadow-md);
            backdrop-filter: blur(10px);
        }

        .sidebar-header {
            padding: 1.75rem 1.5rem;
            border-bottom: 1px solid rgba(46, 139, 87, 0.1);
            text-align: center;
            background: linear-gradient(90deg, rgba(46, 139, 87, 0.05) 0%, rgba(255, 255, 255, 0) 100%);
        }

        .logo {
            display: flex;
            justify-content: center;
            align-items: center;
            text-decoration: none;
            transition: transform 0.3s ease;
        }

        .logo:hover {
            transform: scale(1.02);
        }

        .sidebar-menu { 
            padding: 1.5rem 1rem; 
        }
        
        .menu-item {
            display: flex;
            align-items: center;
            gap: .75rem;
            padding: .875rem 1rem;
            color: var(--text-secondary);
            text-decoration: none;
            border-radius: var(--radius-md);
            transition: all 0.3s ease;
            margin-bottom: 0.5rem;
            position: relative;
            overflow: hidden;
            border: 1px solid transparent;
            background: var(--bg-card);
            box-shadow: var(--shadow-sm);
        }

        .menu-item::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            height: 100%;
            width: 4px;
            background: var(--green-gradient);
            transform: translateX(-100%);
            transition: transform 0.3s ease;
            border-radius: 0 var(--radius-full) var(--radius-full) 0;
        }

        .menu-item:hover {
            background: linear-gradient(135deg, rgba(46, 139, 87, 0.05) 0%, rgba(255, 255, 255, 1) 100%);
            color: var(--primary-green);
            border-color: rgba(46, 139, 87, 0.15);
            box-shadow: var(--shadow-md);
            transform: translateY(-1px);
        }

        .menu-item:hover::before {
            transform: translateX(0);
        }

        .menu-item.active {
            background: var(--green-gradient);
            color: white;
            font-weight: 600;
            box-shadow: var(--shadow-lg);
            border: none;
        }

        .menu-item.active::before {
            background: white;
            transform: translateX(0);
            width: 4px;
        }

        .menu-item.active i {
            color: white;
        }

        .menu-item i {
            font-size: 1.1rem;
            width: 24px;
            text-align: center;
            color: var(--primary-green);
            transition: all 0.3s ease;
        }

        .menu-item:hover i {
            transform: scale(1.1);
        }

        .menu-item .badge {
            margin-left: auto;
            background: var(--warm-gradient);
            color: white;
            font-size: 0.7rem;
            font-weight: 600;
            padding: 0.2rem 0.6rem;
            border-radius: var(--radius-full);
            min-width: 24px;
            text-align: center;
            box-shadow: 0 2px 4px rgba(255, 162, 38, 0.3);
        }

        .menu-item.active .badge {
            background: white;
            color: var(--primary-green);
            box-shadow: 0 2px 4px rgba(255, 255, 255, 0.3);
        }

        /* MAIN CONTENT */
        .main-content {
            flex: 1;
            margin-left: var(--sidebar-width);
        }

        .top-header {
            height: var(--header-height);
            background: var(--bg-card);
            border-bottom: 1px solid rgba(46, 139, 87, 0.1);
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 2.5rem;
            position: sticky;
            top: 0;
            z-index: 80;
            box-shadow: var(--shadow-sm);
            backdrop-filter: blur(10px);
        }

        .content-wrapper { 
            padding: 2rem; 
            min-height: calc(100vh - var(--header-height));
        }

        
        .cart-button {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 44px;
            height: 44px;
            background: var(--bg-card);
            border-radius: var(--radius-full);
            position: relative;
            text-decoration: none;
            transition: all 0.3s ease;
            border: 1px solid rgba(46, 139, 87, 0.1);
            box-shadow: var(--shadow-sm);
        }

        .cart-button:hover {
            background: var(--green-gradient);
            transform: translateY(-2px);
            box-shadow: var(--shadow-md);
        }

        .cart-button:hover i {
            color: white;
        }

        .cart-button i {
            font-size: 1.2rem;
            color: var(--primary-green);
            transition: all 0.3s ease;
        }

        .cart-badge {
            position: absolute;
            top: -5px;
            right: -5px;
            background: var(--warm-gradient);
            color: white;
            font-size: 0.7rem;
            font-weight: 700;
            width: 22px;
            height: 22px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 2px 6px rgba(255, 162, 38, 0.4);
            border: 2px solid white;
        }

       
        .user-card {
            display: flex;
            align-items: center;
            gap: 1rem;
            padding: 0.5rem 1rem;
            background: var(--bg-card);
            border-radius: var(--radius-lg);
            border: 1px solid rgba(46, 139, 87, 0.1);
            box-shadow: var(--shadow-sm);
            transition: all 0.3s ease;
        }

        .user-card:hover {
            box-shadow: var(--shadow-md);
            transform: translateY(-1px);
        }

        .user-avatar {
            width: 44px;
            height: 44px;
            background: var(--sky-gradient);
            border-radius: var(--radius-full);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 600;
            font-size: 1.1rem;
            box-shadow: 0 4px 8px rgba(41, 182, 246, 0.3);
        }

        .user-info {
            display: flex;
            flex-direction: column;
        }

        .user-name {
            font-weight: 600;
            font-size: 0.95rem;
            color: var(--text-primary);
        }

        .user-role {
            font-size: 0.75rem;
            color: var(--primary-green);
            font-weight: 500;
            background: rgba(46, 139, 87, 0.1);
            padding: 0.1rem 0.5rem;
            border-radius: var(--radius-full);
            display: inline-block;
            width: fit-content;
        }

        
        .page-title {
            font-size: 1.6rem;
            font-weight: 700;
            color: var(--text-primary);
            position: relative;
            display: inline-block;
        }

        .page-title::after {
            content: '';
            position: absolute;
            bottom: -8px;
            left: 0;
            width: 50px;
            height: 4px;
            background: var(--green-gradient);
            border-radius: var(--radius-full);
        }

        .page-subtitle {
            color: var(--text-light);
            font-size: 0.9rem;
            margin-top: 1rem;
            padding-left: 0.5rem;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .sidebar { 
                transform: translateX(-100%);
                width: 280px;
                background: var(--bg-sidebar);
            }
            
            .main-content { 
                margin-left: 0; 
            }
            
            .content-wrapper { 
                padding: 1.25rem; 
            }
            
            .top-header {
                padding: 0 1.5rem;
            }
            
            .user-card {
                padding: 0.5rem;
            }
            
            .user-info {
                display: none;
            }
        }
    </style>
</head>

<body>

<div class="dashboard-container">

    
    <aside class="sidebar">
        <div class="sidebar-header">
            <a href="{{ route('home') }}" class="logo">
                <img src="{{ asset('logos/Verde_claro_oscuro.png') }}" 
                    alt="Ruralmente Logo" 
                    style="height: 70px; width: auto; max-width: 140px; object-fit: contain; transition: transform 0.3s ease;">
                <span style="display: none;">Ruralmente</span>
            </a>
        </div>

        <nav class="sidebar-menu">
            
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

            <a href="{{ route('carrito.ver') }}" 
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

            {{-- Logout con estética consistente --}}
            <a href="{{ route('logout') }}" class="menu-item"
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
               style="margin-top: 2rem; color: var(--danger);">
                <i class="fas fa-sign-out-alt" style="color: var(--danger);"></i>
                <span>Cerrar Sesión</span>
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" hidden>
                @csrf
            </form>
        </nav>
    </aside>

    
    <main class="main-content">
        <header class="top-header">
            <div>
                <h1 class="page-title">
                    @yield('page-title', 'Panel del Usuario')
                </h1>
                <p class="page-subtitle">
                    @yield('page-subtitle', 'Salud mental y productos rurales')
                </p>
            </div>

            <div style="display:flex; align-items:center; gap:1.5rem;">
                {{-- Carrito con nuevo diseño --}}
                <a href="{{ route('checkout') }}" class="cart-button">
                    <i class="fas fa-shopping-cart"></i>
                    @if($carritoCount > 0)
                        <span class="cart-badge">{{ $carritoCount }}</span>
                    @endif
                </a>
                
                {{-- Tarjeta de usuario --}}
                <div class="user-card">
                    <div class="user-avatar">
                        {{ strtoupper(substr(Auth::user()->NombreCompleto, 0, 1)) }}
                    </div>
                    <div class="user-info">
                        <span class="user-name">{{ Auth::user()->NombreCompleto }}</span>
                        <span class="user-role">Usuario</span>
                    </div>
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