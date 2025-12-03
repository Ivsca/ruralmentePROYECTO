<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Panel Administrativo') - Salud Mental Rural</title>

    {{-- Fuentes --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Georgia:wght@400;700&display=swap" rel="stylesheet">

    {{-- Chart.js --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    {{-- Íconos --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        :root {
            --primary: #2E8B57;
            --primary-light: #E8F5E9;
            --primary-dark: #1B5E20;
            --secondary: #3B82F6;
            --accent: #8B5CF6;
            --success: #10B981;
            --warning: #F59E0B;
            --danger: #EF4444;
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
            
            --shadow-sm: 0 1px 3px 0 rgba(0,0,0,0.1);
            --shadow-md: 0 4px 6px -1px rgba(0,0,0,0.1);
            --shadow-lg: 0 10px 15px -3px rgba(0,0,0,0.1);
            --shadow-xl: 0 20px 25px -5px rgba(0,0,0,0.1);
            --shadow-2xl: 0 25px 50px -12px rgba(0,0,0,0.25);
            
            --radius-sm: 0.5rem;
            --radius-md: 0.75rem;
            --radius-lg: 1rem;
            --radius-xl: 1.5rem;
            --radius-2xl: 2rem;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
        }

        body {
            background: linear-gradient(135deg, #f8fafc 0%, #e5e7eb 100%);
            min-height: 100vh;
            color: var(--gray-800);
            line-height: 1.5;
        }

        .container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 2rem;
        }

        .font-serif {
            font-family: 'Georgia', 'Times New Roman', serif;
        }

        .glass-card {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .gradient-text {
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .hover-lift {
            transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .hover-lift:hover {
            transform: translateY(-4px);
        }

        .smooth-transition {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        ::-webkit-scrollbar {
            width: 8px;
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
    </style>

    @stack('styles')
</head>
<body>
    {{-- Header/Navbar --}}
    <header class="glass-card fixed top-0 left-0 right-0 z-50 border-b" style="border-color: rgba(229, 231, 235, 0.5);">
        <div class="container mx-auto px-6 py-4">
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-primary to-primary-dark flex items-center justify-center">
                        <i class="fas fa-heart text-white text-lg"></i>
                    </div>
                    <h1 class="text-xl font-bold gradient-text">Salud Mental Rural</h1>
                </div>
                <nav class="hidden md:flex items-center gap-6">
                    <a href="#" class="text-gray-600 hover:text-primary font-medium smooth-transition">Dashboard</a>
                    <a href="#" class="text-gray-600 hover:text-primary font-medium smooth-transition">Triajes</a>
                    <a href="#" class="text-gray-600 hover:text-primary font-medium smooth-transition">Usuarios</a>
                    <a href="#" class="text-gray-600 hover:text-primary font-medium smooth-transition">Reportes</a>
                </nav>
                <div class="flex items-center gap-4">
                    <div class="hidden md:block text-right">
                        <p class="text-sm font-medium text-gray-900">Administrador</p>
                        <p class="text-xs text-gray-500">Último acceso: Hoy</p>
                    </div>
                    <div class="w-10 h-10 rounded-full bg-gradient-to-br from-gray-200 to-gray-300 flex items-center justify-center">
                        <i class="fas fa-user text-gray-600"></i>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <main class="pt-24">
        <div class="container">
            @yield('content')
        </div>
    </main>

    {{-- Footer --}}
    <footer class="mt-16 py-8 border-t" style="border-color: rgba(229, 231, 235, 0.5);">
        <div class="container mx-auto px-6">
            <div class="flex flex-col md:flex-row justify-between items-center">
                <div class="mb-4 md:mb-0">
                    <div class="flex items-center gap-2 mb-2">
                        <div class="w-8 h-8 rounded-lg bg-primary/10 flex items-center justify-center">
                            <i class="fas fa-leaf text-primary"></i>
                        </div>
                        <span class="font-bold text-gray-800">Salud Mental Rural</span>
                    </div>
                    <p class="text-sm text-gray-500">Sistema de evaluación psicológica comunitaria</p>
                </div>
                <div class="text-sm text-gray-500">
                    <p>© {{ date('Y') }} Todos los derechos reservados</p>
                    <p class="mt-1">v1.0.0 · Última actualización: {{ date('d/m/Y') }}</p>
                </div>
            </div>
        </div>
    </footer>

    @stack('scripts')
</body>
</html>