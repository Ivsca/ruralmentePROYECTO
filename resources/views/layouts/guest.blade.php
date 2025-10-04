<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet" />
    <link rel="shortcut icon" href="{{ asset('logos/Ruralmente_logo_negro.png') }}" type="image/x-icon">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles
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

        @if (request()->routeIs('ruralCafe', 'about', 'workshop', 'agro', 'news', 'tourism', 'workshop-course'))
            #navbottom {
                background: #000;
                font-weight: 800;
                top: 0;
            }
        @endif


        @if (request()->routeIs('welcome'))

            #navbottom.scroll {
                background: #ECE8DD;
                color: #073b17;
                font-weight: 800;
            }

            #navbottom.scroll #logo {
                content: url({{ asset('logos/Ruralmente_logo_negro.png') }});
                width: 70px;
                /* Cambia la URL a la imagen roja */
            }

            #navbottom.scroll #inst {
                color: black;
            }

            #navbottom.scroll #avatar {
                content: url({{ asset('icon/avatar.png') }});
                width: 2.25rem;
            }

        @endif

        #sapo {
            background-image: url('../Public/fondos_imagenes_video/Fondo_atardecer.jpg');
            background-repeat: no-repeat;
            background-size: cover;
        }

        #carousel-container {
            width: 90vw;
            background-color: rgb(216, 216, 216);
            height: auto;
            margin: auto;
            overflow: hidden;
        }

        #carousel {
            border-radius: 20px;
            display: flex;
            justify-content: flex-start;
            align-items: center;
            height: 30vh;
            animation: scroll 40s linear infinite;
            width: max-content;
            margin: 0 auto;
        }

        #carousel-items {
            width: 200px;
            margin-right: 20px;
        }

        #carousel-items img {
            filter: grayscale(100%);
            transition: filter 0.2s ease;
            width: 100%
        }

        #carousel-items:hover img {
            filter: grayscale(0%);
        }

        @keyframes scroll {
            0% {
                transform: translateX(0);
            }

            50% {
                transform: translateX(-50%);
            }

            50.0001% {
                transform: translateX(0);
            }

            100% {
                transform: translateX(-50%);
            }
        }

        .alturaImage {
            height: 300px;
            width: 400px;
        }

        .btn-type-1 {
            margin-top: 2.14286rem;
            border: 1px solid #9d9d9d;
            border-left: none;
            position: relative;
            height: 3.8rem;
            width: 15.71429rem;
            max-width: 100%;
            margin-left: 2.14286rem;
            line-height: 3.78571rem;
            letter-spacing: .4rem;
            font-size: .92857rem;
            font-family: Avenir, nunito;
            font-weight: bolder;
            text-transform: uppercase;
            cursor: pointer;
            padding: 0;
            z-index: 1;
            color: #2e2e2e;
        }

        .btn-type-1 {
            display: block;
            z-index: 1;
            position: relative;
            padding-right: 2.14286rem;
        }

        .btn-type-1:before {
            content: "";
            left: -2.14286rem;
            -webkit-transition: all .333s ease-in;
            -o-transition: all .333s ease-in;
            transition: all .333s ease-in;
            top: 0;
            bottom: 0;
            background: #35452B;
            width: 1.42857rem;
            position: absolute;
            margin: auto;
            height: 100%;
            z-index: -1;
        }

        .btn-type-1.active,
        .btn-type-1:hover {
            color: #ffffff;
            border-color: transparent;
            outline: none;
        }

        .btn-type-1.active:before,
        .btn-type-1:hover:before {
            width: 113%;
        }

        @media (max-width: 991.98px) {
            .btn-type-1 {
                margin-left: 2.14286rem;
            }
        }
    </style>

</head>

<body class="text-justify text-black" id="contentEval">



    <div class="font-sans antialiased text-gray-900">
        {{ $slot }}
    </div>

    @livewireScripts
</body>



</html>
