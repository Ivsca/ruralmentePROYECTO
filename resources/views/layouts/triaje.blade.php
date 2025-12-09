<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Resultado del triaje')</title>

    
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>
<body class="antialiased">

    <!-- ========================= -->
    <!-- FONDO ESTILO TRIAJE -->
    <!-- ========================= -->
    <section class="w-full min-h-screen py-20 bg-gradient-to-br from-emerald-50 via-teal-50 to-cyan-50 relative overflow-hidden">

        <!-- Fondos decorativos -->
        <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_center,_var(--tw-gradient-stops))] from-green-100/25 via-transparent to-transparent"></div>
        <div class="absolute top-10 right-10 w-32 h-32 bg-green-200/30 rounded-full blur-2xl"></div>
        <div class="absolute bottom-10 left-10 w-40 h-40 bg-teal-200/20 rounded-full blur-3xl"></div>

        <!-- Contenido principal -->
        <div class="relative z-10 container mx-auto px-4">
            @yield('content')
        </div>

    </section>

</body>
</html>
