<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="{{ asset('Sello_Rural_Mente_Negro.png') }}" type="image/x-icon">

    <title>{{ config('app.name', 'Laravel') }}</title>

    {{-- fonts --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body {
            font-family: 'Nunito', sans-serif;

            scrollbar-width: thin;
            /* "auto" or "thin" */
            scrollbar-color: blue orange;

        }

        #contentEval {
            overflow-y: scroll;
            scroll-margin: 20px;
        }

        #contentEval::-webkit-scrollbar {
            background: none;
            width: 10px;
            right: 10px;
        }

        #contentEval::-webkit-scrollbar-thumb {
            background: teal;
            border-radius: 10px;
        }

        #contentEval::-webkit-scrollbar-track-piece {
            margin: 20px 0;
        }

        #scrolling {
            overflow: hidden;
            overflow-y: scroll;
        }

        #scrolling::-webkit-scrollbar {
            width: 0;

        }

        .slider {
            -webkit-appearance: none;
            width: 100%;
            height: 10px;
            border-radius: 5px;
            background-image: linear-gradient(43deg, #13b9a7 0%, #105f5a 46%, #042f2e 100%);
            outline: none;
            opacity: 0.7;
            -webkit-transition: .2s;
            transition: opacity .2s;
        }

        .slider::-webkit-slider-thumb {
            -webkit-appearance: none;
            appearance: none;
            width: 20px;
            height: 20px;
            border-radius: 50%;
            background-image: linear-gradient(160deg, #042f2e 0%, #0c9589 100%);
            cursor: pointer;
        }

        .slider::-moz-range-thumb {
            width: 20px;
            height: 20px;
            border-radius: 50%;
            background-color: #0093E9;
            background-image: linear-gradient(160deg, #0093E9 0%, #80D0C7 100%);
            cursor: pointer;
        }
        .boton{
            border-color: rgb(59 130 246);
            color: rgb(59 130 246);
        }
        .boton:hover{
            background: rgb(59 130 246);
        }

        
    </style>
    <!-- Styles -->
    @livewireStyles
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body id="scrolling" class="text-black">
    <x-banner />

    <div class="min-h-screen bg-gray-100">
        @livewire('navigation-menu')


        <!-- Page Heading -->
        @if (isset($header))
            <header class="bg-white shadow">
                <div class="px-4 py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endif

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
    </div>

    @stack('modals')

    @livewireScripts
</body>

</html>
