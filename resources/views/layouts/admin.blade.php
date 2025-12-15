<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard') - Panel de administración</title>

    {{-- Fuentes --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    {{-- Chart.js --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    {{-- Íconos --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    

    <style>
        :root {
            --sidebar-width: 280px;
            --sidebar-collapsed: 80px;
            --header-height: 80px;
            
            /* Paleta de colores */
            --primary-green: #2E8B57;
            --green-light: #3CB371;
            --green-gradient: linear-gradient(135deg, #3CB371 0%, #2E8B57 100%);
            --green-gradient-light: linear-gradient(135deg, #48C78E 0%, #3CB371 100%);
            
            --sky-blue: #4FC3F7;
            --sky-blue-dark: #29B6F6;
            --sky-gradient: linear-gradient(135deg, #4FC3F7 0%, #29B6F6 100%);
            
            --warm-orange: #FFA726;
            --warm-yellow: #FFCA28;
            --warm-gradient: linear-gradient(135deg, #FFCA28 0%, #FFA726 100%);
            
            --accent-purple: #8B5CF6;
            --purple-gradient: linear-gradient(135deg, #A78BFA 0%, #8B5CF6 100%);
            
            --danger: #EF4444;
            --danger-light: rgba(239, 68, 68, 0.1);
            
            /* Fondos y elementos */
            --bg-primary: #F8FAF7;
            --bg-sidebar: linear-gradient(180deg, #FFFFFF 0%, #F8FAF7 100%);
            --bg-card: #FFFFFF;
            --text-primary: #2D3748;
            --text-secondary: #4A5568;
            --text-light: #718096;
            
            /* Sombras suaves */
            --shadow-sm: 0 2px 8px rgba(46, 139, 87, 0.08);
            --shadow-md: 0 4px 12px rgba(46, 139, 87, 0.12);
            --shadow-lg: 0 8px 24px rgba(46, 139, 87, 0.16);
            --shadow-xl: 0 12px 32px rgba(46, 139, 87, 0.2);
            
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
            
            /* Bordes redondeados */
            --radius-sm: 8px;
            --radius-md: 12px;
            --radius-lg: 16px;
            --radius-xl: 20px;
            --radius-full: 999px;
            
            /* Transiciones */
            --transition-smooth: all 0.3s ease;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Inter', 'Poppins', sans-serif;
        }

        body {
            background-color: var(--bg-primary);
            color: var(--text-primary);
            min-height: 100vh;
            background-image: 
                radial-gradient(at 20% 30%, rgba(46, 139, 87, 0.03) 0px, transparent 50%),
                radial-gradient(at 80% 10%, rgba(41, 182, 246, 0.03) 0px, transparent 50%);
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

        .sidebar.collapsed {
            width: var(--sidebar-collapsed);
        }


        .sidebar.collapsed .logo-text {
            display: none;
        }

        .sidebar-menu {
            padding: 1.75rem 1rem;
        }

        .menu-section {
            margin-bottom: 2.5rem;
        }

        .menu-title {
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 0.1em;
            color: var(--text-light);
            margin-bottom: 1.25rem;
            font-weight: 600;
            white-space: nowrap;
            padding-left: 0.75rem;
            position: relative;
        }

        .menu-title::before {
            content: '';
            position: absolute;
            left: 0;
            top: 50%;
            transform: translateY(-50%);
            width: 4px;
            height: 12px;
            background: var(--green-gradient);
            border-radius: var(--radius-full);
        }

        .sidebar.collapsed .menu-title {
            display: none;
        }

        .menu-item {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 0.875rem 1rem;
            color: var(--text-secondary);
            text-decoration: none;
            border-radius: var(--radius-md);
            margin-bottom: 0.5rem;
            transition: var(--transition-smooth);
            white-space: nowrap;
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
            transform: translateX(5px);
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
            width: 20px;
            text-align: center;
            font-size: 1.125rem;
            color: var(--primary-green);
            transition: var(--transition-smooth);
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

        .sidebar.collapsed .menu-item span {
            display: none;
        }

        .sidebar.collapsed .menu-item .badge {
            display: none;
        }

        .sidebar.collapsed .menu-item {
            justify-content: center;
            padding: 0.875rem;
        }

        /* ===== MAIN CONTENT ===== */
        .main-content {
            flex: 1;
            margin-left: var(--sidebar-width);
            transition: margin-left 0.3s ease;
            min-height: 100vh;
        }

        .sidebar.collapsed ~ .main-content {
            margin-left: var(--sidebar-collapsed);
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
            z-index: 90;
            box-shadow: var(--shadow-sm);
            backdrop-filter: blur(10px);
        }

        .header-left {
            display: flex;
            align-items: center;
            gap: 1.25rem;
        }

        .toggle-sidebar {
            width: 44px;
            height: 44px;
            border-radius: var(--radius-md);
            border: 1px solid rgba(46, 139, 87, 0.1);
            background: var(--bg-card);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--primary-green);
            cursor: pointer;
            transition: var(--transition-smooth);
            box-shadow: var(--shadow-sm);
        }

        .toggle-sidebar:hover {
            background: var(--green-gradient);
            color: white;
            transform: rotate(180deg);
            border-color: var(--primary-green);
            box-shadow: var(--shadow-md);
        }

        .page-title h1 {
            font-size: 1.6rem;
            font-weight: 700;
            color: var(--text-primary);
            font-family: 'Poppins', sans-serif;
            position: relative;
            display: inline-block;
        }

        .page-title h1::after {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 0;
            width: 40px;
            height: 3px;
            background: var(--green-gradient);
            border-radius: var(--radius-full);
        }

        .page-title p {
            font-size: 0.9rem;
            color: var(--text-light);
            margin-top: 0.5rem;
        }

        .header-right {
            display: flex;
            align-items: center;
            gap: 1.75rem;
        }

        .header-search {
            position: relative;
        }

        .header-search input {
            padding: 0.75rem 1rem 0.75rem 2.75rem;
            border: 1px solid rgba(46, 139, 87, 0.1);
            border-radius: var(--radius-full);
            font-size: 0.9rem;
            width: 280px;
            transition: var(--transition-smooth);
            background: var(--bg-card);
            color: var(--text-primary);
            box-shadow: var(--shadow-sm);
        }

        .header-search input:focus {
            outline: none;
            border-color: var(--primary-green);
            box-shadow: 0 0 0 3px rgba(46, 139, 87, 0.1), var(--shadow-md);
            width: 320px;
        }

        .header-search i {
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: var(--text-light);
            transition: var(--transition-smooth);
        }

        .header-search input:focus + i {
            color: var(--primary-green);
        }

       
        .user-menu {
            display: flex;
            align-items: center;
            gap: 0.875rem;
            padding: 0.5rem;
            border-radius: var(--radius-lg);
            background: var(--bg-card);
            border: 1px solid rgba(46, 139, 87, 0.1);
            box-shadow: var(--shadow-sm);
            transition: var(--transition-smooth);
            cursor: pointer;
        }

        .user-menu:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-md);
            border-color: rgba(46, 139, 87, 0.2);
        }

        .user-avatar {
            width: 44px;
            height: 44px;
            border-radius: var(--radius-full);
            background: var(--sky-gradient);
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
            color: var(--text-primary);
            font-size: 0.9rem;
        }

        .user-role {
            font-size: 0.75rem;
            color: var(--primary-green);
            font-weight: 500;
            background: rgba(46, 139, 87, 0.1);
            padding: 0.1rem 0.5rem;
            border-radius: var(--radius-full);
            width: fit-content;
        }

        
        .content-wrapper {
            padding: 2.5rem;
            min-height: calc(100vh - var(--header-height));
        }

        /* ===== RESPONSIVE ===== */
        @media (max-width: 1024px) {
            .sidebar {
                transform: translateX(-100%);
                box-shadow: var(--shadow-xl);
            }
            
            .sidebar.active {
                transform: translateX(0);
            }
            
            .main-content {
                margin-left: 0;
            }
            
            .toggle-sidebar {
                display: flex;
            }
            
            .content-wrapper {
                padding: 1.75rem;
            }
        }

        @media (max-width: 768px) {
            .header-search input {
                width: 200px;
            }
            
            .header-search input:focus {
                width: 240px;
            }
            
            .content-wrapper {
                padding: 1.5rem;
            }
            
            .top-header {
                padding: 0 1.5rem;
            }
        }

        @media (max-width: 640px) {
            .header-search {
                display: none;
            }
            
            .user-info {
                display: none;
            }
            
            .user-menu {
                padding: 0.25rem;
            }
            
            .page-title h1 {
                font-size: 1.4rem;
            }
            
            .content-wrapper {
                padding: 1.25rem;
            }
        }
    </style>

    @stack('styles')
</head>
<body>
@php
    // Obtén el id del usuario (null si no está autenticado)
    $userId = auth()->id();
@endphp
    <div class="dashboard-container">
        
        <aside class="sidebar" id="sidebar">
            <div class="sidebar-header">
                <a href="{{ route('home') }}" class="logo">
                    <img src="{{ asset('logos/Verde_claro_oscuro.png') }}" 
                        alt="Ruralmente Logo" 
                        style="height: 70px; width: auto; max-width: 140px; object-fit: contain; transition: transform 0.3s ease;">
                    <span style="display: none;">Ruralmente</span>
                </a>
            </div>

            <nav class="sidebar-menu">
                <div class="menu-section">
                    <div class="menu-title">Dashboard</div>
                    <a href="{{ route('dashboard') }}" class="menu-item active">
                        <i class="fas fa-chart-line"></i>
                        <span>Dashboard</span>
                    </a>
                </div>
                
                <div class="menu-section">

                    <div class="menu-title">Gestión</div>
                    <a href="{{ route('admin.triajes.index') }}" class="menu-item">
                        <i class="fas fa-clipboard-check"></i>
                        <span>Triajes</span>
                        @php
                            $triajesCount = \App\Models\Triaje::count();
                        @endphp
                        @if($triajesCount > 0)
                            <span class="badge">{{ $triajesCount }}</span>
                        @endif
                    </a>
                    <a href="#" class="menu-item">
                        <i class="fas fa-box-open"></i>
                        <span>Productos</span>
                        @php
                            $productsCount = \App\Models\Product::count();
                        @endphp
                        @if($productsCount > 0)
                            <span class="badge">{{ $productsCount }}</span>
                        @endif
                    </a>
                    <a href="{{ route('admin.users.index') }}" class="menu-item">
                    <a href="{{ route('carrito.ver') }}" class="menu-item">
                        <i class="fas fa-box-open"></i>
                        <span>Carrito de compras</span>

                        <!-- CONTADOR DINÁMICO DEL CARRITO -->
                        <span class="badge contador-carrito"
                            style="margin-left: auto; background: var(--success); color: white;
                            border-radius: 10px; padding: 2px 8px; font-size: 0.75rem;">
                            0
                        </span>
                    </a>

                    <a href="{{ route('admin.users.index') }}" class="menu-item">

                        <i class="fas fa-users"></i>
                        <span>Usuarios</span>
                        @php
                            $usersCount = \App\Models\User::count();
                        @endphp
                        @if($usersCount > 0)
                            <span class="badge">{{ $usersCount }}</span>
                        @endif
                    </a>
                </div>


                <div class="menu-section">
                    <div class="menu-title">Configuración</div>
                    <a href="{{ route('logout') }}" class="menu-item"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fas fa-sign-out-alt" style="color: var(--danger);"></i>
                        <span style="color: var(--danger);">Cerrar Sesión</span>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </nav>
        </aside>

        
        <main class="main-content">
            
            <header class="top-header">
                <div class="header-left">
                    <button class="toggle-sidebar" id="toggleSidebar">
                        <i class="fas fa-bars"></i>
                    </button>
                    <div class="page-title">
                        <h1>@yield('page-title', 'Dashboard')</h1>
                        <p>@yield('page-subtitle', 'Panel de control del sistema')</p>
                    </div>
                </div>

                <div class="header-right">
                    <div class="header-search">
                        <i class="fas fa-search"></i>
                        <input type="text" placeholder="Buscar...">
                    </div>
                    
                    <div class="user-menu">
                        <div class="user-avatar">
                            {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                        </div>
                        <div class="user-info">
                            <span class="user-name">{{ Auth::user()->NombreCompleto }}</span>
                            <span class="user-role">Administrador</span>
                        </div>
                    </div>
                </div>
            </header>

            
            <div class="content-wrapper">
                @yield('content')
            </div>
        </main>
    </div>

    <script>
        
        document.getElementById('toggleSidebar').addEventListener('click', function() {
            const sidebar = document.getElementById('sidebar');
            const isMobile = window.innerWidth <= 1024;
            
            if (isMobile) {
                sidebar.classList.toggle('active');
            } else {
                sidebar.classList.toggle('collapsed');
            }
        });

       
        document.addEventListener('click', function(event) {
            const sidebar = document.getElementById('sidebar');
            const toggleBtn = document.getElementById('toggleSidebar');
            const isMobile = window.innerWidth <= 1024;
            
            if (isMobile && sidebar.classList.contains('active') && 
                !sidebar.contains(event.target) && 
                !toggleBtn.contains(event.target)) {
                sidebar.classList.remove('active');
            }
        });

        
        function handleResize() {
            const sidebar = document.getElementById('sidebar');
            if (window.innerWidth <= 1024) {
                sidebar.classList.remove('collapsed');
            }
        }

        window.addEventListener('resize', handleResize);
        handleResize(); // Initial check

        const USER_ID = @json($userId);

        (async function cantidad_productos_carrito() {
            const contador = document.querySelector('.contador-carrito');
            if (!contador) return;

            if (!USER_ID) {
                contador.textContent = '0';
                return;
            }

            try {
                const urlBase = "{{ url('/cantidad-productos-carrito') }}";
                const response = await fetch(`${urlBase}/${USER_ID}`, {
                    headers: { 'Accept': 'application/json' }
                });

                if (!response.ok) return;

                const data = await response.json();
                contador.textContent = data?.cantidad ?? '0';
            } catch (err) {
                console.error('Error al obtener cantidad del carrito:', err);
            }
        })();

    </script>

    @stack('scripts')
</body>
</html>