<div>
    <div class="w-[100%]">
        <video autoplay muted loop class="object-cover w-[100%] h-[100vh]"
            src="{{ asset('videos/2023_06_05_11_13_IMG_8633.mp4') }}"></video>
    </div>
    <nav
        class="z-30 absolute w-[100%] h-[17%] top-0 bg-gradient-to-b items-center from-black from-20%  text-gray-100 grid grid-cols-12 gap-4">
        <ul class="col-span-3 ">
            <img class="w-20 mx-auto" src="{{ asset('logos/Ruralmente_banco.png') }}" alt="imagen">
        </ul>
        <ul class="col-span-6">
            <li class="mt-3 text-center">
                <h1 class="text-xl">IMPACTOS</h1>
            </li>
            <li class="flex justify-center gap-2 mt-5 text-center align-middle">
                <div class=" w-96">
                    <h1 class="text-xl font-semibold">Agriculteres</h1>
                    <h1>280 usuarios Atendidos</h1>
                </div>
                <div class="w-1 h-10 mt-2 bg-gray-500 rounded-lg"></div>
                <div class="w-96 group ">
                    <a href="#" class="flex justify-center text-xl font-semibold">
                        <img class="w-12 " src="{{ asset('icon/graficos.png') }}" alt="">
                    </a>
                    <div
                        class="w-full h-[400px] left-0 mt-3 hidden absolute group-hover:flex justify-center group-hover:text-white group-hover:bg-black backdrop-blur-md group-hover:bg-opacity-50  bg-opacity-70 items-center p-4 rounded-lg">
                        <p class="w-6/12 text-justify p-2 text-lg font-semibold">El agro enfrenta desafíos en salud
                            mental. Ruralmente no sólo aborda este problema, lo transforma. Descubre el impacto positivo
                            que juntos estamos generando</p>
                    </div>
                </div>
                <div class="w-1 h-10 mt-2 bg-gray-500 rounded-lg"></div>
                <div class="w-96">
                    <a href="#" class="flex justify-center text-xl font-semibold"><img class="w-12 "
                            src="{{ asset('icon/dd.png') }}" alt=""></a>
                </div>
            </li>
        </ul>
        <ul class="col-span-3 text-center">
            <h1 class="mb-2 text-lg font-semibold">OBJETIVOS DE DESARROLLO SOSTENIBLE</h1>
            <div class="flex justify-center gap-8 ">
                <div class="group">
                    <img id="ods_3" class="w-16 h-16 rounded-lg cursor-pointer bg-white"
                        src="{{ asset('ods/ods 3.png') }}" alt="logo1">
                    <div
                        class="w-full h-[400px] left-0 mt-1 hidden absolute group-hover:flex flex-col justify-center group-hover:text-white group-hover:bg-black backdrop-blur-md group-hover:bg-opacity-70  bg-opacity-70 items-center p-4 rounded-lg">
                        <span class="text-xl font-extrabold">Salud y Bienestar 🌱🌍</span>
                        <p class="w-6/12 text-justify p-2 text-lg">
                            En Ruralmente, abrazamos el compromiso con el Objetivo de Desarrollo Sostenible 3,
                            trabajando incansablemente para mejorar la salud mental en el sector agrícola. Nuestra
                            plataforma Almácigo y servicios especializados están diseñados para cultivar un ambiente
                            emocionalmente saludable y promover el bienestar entre las comunidades agrícolas.
                        </p>
                        <img class="w-24 mt-5" src="{{ asset('icon/blancos/ods3blanco.png') }}" alt="">
                    </div>
                </div>

                <div class="group">
                    <img class="w-16 h-16 rounded-lg cursor-pointer bg-white" src="{{ asset('ods/ods 5.png') }}"
                        alt="logo2">
                    <div
                        class=" w-full h-[400px] left-0 mt-1 hidden absolute group-hover:flex flex-col justify-center   group-hover:text-white group-hover:bg-black backdrop-blur-md group-hover:bg-opacity-70  bg-opacity-70 items-center p-4 rounded-lg">
                        <span class="text-xl font-extrabold">Igualdad de Género 🌈✨</span>
                        <p class="w-6/12 text-justify p-2 text-lg">
                            Enfocados en la equidad, abrazamos el <b>ODS 5</b>. Creemos en la importancia de proporcionar apoyo
                            y recursos igualitarios para todos, independientemente del género. Almácigo trabaja para
                            eliminar barreras y fomentar un entorno agrícola inclusivo.
                        </p>
                        <img class="w-24 mt-5" src="{{ asset('icon/blancos/ods5blanco.png') }}" alt="">
                    </div>
                </div>

                <div class="group">
                    <img class="w-16 h-16 rounded-lg cursor-pointer bg-white " src="{{ asset('ods/ods 10.png') }}"
                        alt="logo3">
                    <div
                        class=" w-full h-[400px] left-0 mt-1 hidden absolute group-hover:flex flex-col justify-center   group-hover:text-white group-hover:bg-black backdrop-blur-md group-hover:bg-opacity-70  bg-opacity-70 items-center p-4 rounded-lg">
                        <span class="text-xl font-extrabold">Reducción de las Desigualdades 🌐🤝</span>
                        <p class="w-6/12 text-justify p-2 text-lg">Nuestra misión incluye la promoción del ODS 10.
                            Trabajamos activamente para reducir las desigualdades en el sector agrícola, asegurándonos
                            de que cada individuo tenga acceso a servicios de salud mental de alta calidad, sin importar
                            su posición o antecedentes.
                        </p>
                        <img class="w-24 mt-5" src="{{ asset('icon/blancos/ods10blanco.png') }}" alt="">
                    </div>
                </div>

            </div>
        </ul>
    </nav>

    <x-navbar-welcome :seeButton="$seeButton" :register="$register" />




    <!-- section donde se aloja todo el contenido -->
    <section class="w-full flex flex-col items-center justify-center mt-[9vh] ">
        <article class="flex items-center justify-center w-full ">
            <div class="flex flex-col justify-center w-1/2 p-4 m-7">
                <h1 class="text-3xl text-center">Quiénes Somos?</h1>
                <p class="text-xl font-medium font-body"><strong>Ruralmente</strong> es una empresa que impulsa el éxito
                    personal y laboral de los agricultores colombianos, con atención.</p>
                <div class="my-4">
                    <a href="{{ route('about') }}" class="btn-type-1">Conocenos más</a>
                </div>
            </div>

            <div class="flex justify-end ">
                <img class="" src="{{ asset('fondos_imagenes_video/agricultor.png') }}" alt="">
            </div>
        </article>

        <!-- contenedor de la linea almácigo -->
        <article class="grid items-center justify-center w-11/12 grid-cols-2 mt-3">
            <div class="flex justify-center ">
                <video class="w-1/2 m-3 shadow-2xl rounded-2xl shadow-slate-600 "
                    src="{{ asset('videos/12 conexión video.mp4') }}" controls></video>
            </div>


            <div class=" p-3">
                <h1 class="text-4xl">Linea Almácigo</h1>
                <p class="font-body text-lg">“¡Hola! Mi nombre es Alma, y pertenezco al equipo de
                    Ruralmente; tengo 25
                    años, y soy de cuna campesina. Decidí ser psicóloga porque crecí viendo el estrés y la preocupación
                    que, el trabajo en el campo, le producía a mi papá. A través de nuestra plataforma psicosocial
                    Almácigo, busco ayudarle a la gente en el campo a cuidar de su bienestar”.</p>
            </div>

        </article>

        <!-- historieta  -->
        <article id="sapo" class="flex justify-around w-11/12 my-2">
            <div class="w-1/5">
                <div class="w-full h-96">
                    <img class="w-full h-full object-cover rounded-md"
                        src="{{ asset('fondos_imagenes_video/1.jpeg') }}" alt="">
                </div>
                <a href="{{route('news')}}"
                    class="block py-3 mt-4 font-semibold text-center text-gray-100 bg-teal-700 rounded-lg text-md">Noticias</a>
            </div>
            <div class="w-1/5">
                <div class="w-full h-96">
                    <img class="object-cover w-full h-full rounded-md"
                        src="{{ asset('fondos_imagenes_video/pasos_cafe.jpg') }}" alt="">
                </div>
                <a href="#"
                    class="block py-3 mt-4 font-semibold text-center text-gray-100 bg-teal-700 rounded-lg text-md">Sostenibilidad</a>
            </div>
            <div class="w-1/5">
                <div class="w-full h-96">
                    <img class="object-cover w-full h-full rounded-md"
                        src="{{ asset('fondos_imagenes_video/tonos_cafe.jpg') }}" alt="">
                </div>
                <a href="#"
                    class="bg-teal-700 rounded-lg block text-center font-semibold text-gray-100 text-md mt-4 py-3">Boletin
                    cafeteros</a>
            </div>
        </article>

        <!-- carusel de los aliados -->
        <article class="w-full h-[40vh] flex justify-between items-center my-5 rounded-lg py-10" loop>
            <div id="carousel-container" class="w-[80%] bg-gray-200 rounded-lg">
                <div id="carousel"
                    class="flex justify-start items-center animate-scroll w-max-content scroll-animation h-auto">
                    {{-- elementos normal --}}
                    <a href="#" id="carousel-items" class="w-[300px] m-5"><img class=""
                            src="{{ asset('Aliados/Alcaldia.png') }}" alt="Imagen 1"></a>
                    <a href="#" id="carousel-items" class="w-[300px] m-5"><img
                            src="{{ asset('Aliados/agcenter.png') }}" alt="Imagen 2"></a>
                    <a href="#" id="carousel-items" class="w-[300px] m-5"><img
                            src="{{ asset('Aliados/cafetear.png') }}" alt="Imagen 4"></a>
                    <a href="#" id="carousel-items" class="w-[300px] m-5"><img
                            src="{{ asset('Aliados/creame.png') }}" alt="Imagen 5"></a>
                    <a href="#" id="carousel-items" class="w-[300px] m-5"><img
                            src="{{ asset('Aliados/cvs.png') }}" alt="Imagen 6"></a>
                    <a href="#" id="carousel-items" class="w-[300px] m-5"><img
                            src="{{ asset('Aliados/hubsena.png') }}" alt="Imagen 7"></a>
                    <a href="#" id="carousel-items" class="w-[300px] m-5"><img
                            src="{{ asset('Aliados/encampo.png') }}" alt="Imagen 8"></a>
                    <a href="https://impacthub.net/" id="carousel-items" class="w-[300px] m-5"><img
                            src="{{ asset('Aliados/impacthub.png') }}" alt="Imagen 9"></a>
                    <a href="https://in-ova.co/" id="carousel-items" class="w-[300px] m-5"><img
                            src="{{ asset('Aliados/in-ova.png') }}" alt="Imagen 10"></a>
                    <a href="https://www.funlam.edu.co/" id="carousel-items" class="w-[300px] m-5"><img
                            src="{{ asset('Aliados/luisamigo.png') }}" alt="Imagen 11"></a>
                    <a href="https://www.rutanmedellin.org/" id="carousel-items" class="w-[300px] m-5"><img
                            src="{{ asset('Aliados/nodos.png') }}" alt="Imagen 12"></a>
                    <a href="https://www.rutanmedellin.org/" id="carousel-items" class="w-[300px] m-5"><img
                            src="{{ asset('Aliados/rutan.png') }}" alt="Imagen 13"></a>
                    <a href="https://redtecnoparque.com/" id="carousel-items" class="w-[300px] m-5"><img
                            src="{{ asset('Aliados/tecnoParque.png') }}" alt="Imagen 14"></a>
                    <a href="https://www.upb.edu.co/es/home" id="carousel-items" class="w-[300px] m-5"><img
                            src="{{ asset('Aliados/upb.png') }}" alt="Imagen 15"></a>
                    {{-- duplicados --}}
                    <a href="#" id="carousel-items" class="w-[300px] m-5"><img class=""
                            src="{{ asset('Aliados/Alcaldia.png') }}" alt="Imagen 1"></a>
                    <a href="#" id="carousel-items" class="w-[300px] m-5"><img
                            src="{{ asset('Aliados/agcenter.png') }}" alt="Imagen 2"></a>
                    <a href="#" id="carousel-items" class="w-[300px] m-5"><img
                            src="{{ asset('Aliados/cafetear.png') }}" alt="Imagen 4"></a>
                    <a href="#" id="carousel-items" class="w-[300px] m-5"><img
                            src="{{ asset('Aliados/creame.png') }}" alt="Imagen 5"></a>
                    <a href="#" id="carousel-items" class="w-[300px] m-5"><img
                            src="{{ asset('Aliados/cvs.png') }}" alt="Imagen 6"></a>
                    <a href="#" id="carousel-items" class="w-[300px] m-5"><img
                            src="{{ asset('Aliados/hubsena.png') }}" alt="Imagen 7"></a>
                    <a href="#" id="carousel-items" class="w-[300px] m-5"><img
                            src="{{ asset('Aliados/encampo.png') }}" alt="Imagen 8"></a>
                    <a href="https://impacthub.net/" id="carousel-items" class="w-[300px] m-5"><img
                            src="{{ asset('Aliados/impacthub.png') }}" alt="Imagen 9"></a>
                    <a href="https://in-ova.co/" id="carousel-items" class="w-[300px] m-5"><img
                            src="{{ asset('Aliados/in-ova.png') }}" alt="Imagen 10"></a>
                    <a href="https://www.funlam.edu.co/" id="carousel-items" class="w-[300px] m-5"><img
                            src="{{ asset('Aliados/luisamigo.png') }}" alt="Imagen 11"></a>
                    <a href="https://www.rutanmedellin.org/" id="carousel-items" class="w-[300px] m-5"><img
                            src="{{ asset('Aliados/nodos.png') }}" alt="Imagen 12"></a>
                    <a href="https://www.rutanmedellin.org/" id="carousel-items" class="w-[300px] m-5"><img
                            src="{{ asset('Aliados/rutan.png') }}" alt="Imagen 13"></a>
                    <a href="https://redtecnoparque.com/" id="carousel-items" class="w-[300px] m-5"><img
                            src="{{ asset('Aliados/tecnoParque.png') }}" alt="Imagen 14"></a>
                    <a href="https://www.upb.edu.co/es/home" id="carousel-items" class="w-[300px] m-5"><img
                            src="{{ asset('Aliados/upb.png') }}" alt="Imagen 15"></a>
                </div>
            </div>
        </article>


        <article class="w-9/12 my-4 bg-gray-200 rounded-lg mt-10">
                <div class="p-4">
                    <p class="my-2 text-lg text-black"><span class="font-bold">Desata la Productividad:</span> Secretos Revelados</p>
                    <p class="text-justify text-black">¡Prepárate para transformar tu cosecha! En Ruralmente, desvelamos los secretos para potenciar la productividad agrícola. Descubre cómo nuestros servicios innovadores y planes personalizados están llevando a las empresas agroalimentarias a nuevos niveles de eficiencia. ¡Aumenta tu rendimiento y cosecha el éxito con nosotros!</p>
                </div>
                <div class="items-center p-4">
                    <p class="my-2 text-black text-lg"><span class="font-bold">Bienestar en el Agro:</span> El Eslabón Perdido para la Calidad de Vida</p>
                    <p class="text-justify text-black"><span class="font-semibold">¿Imaginas un entorno agrícola donde el bienestar es la clave?</span> En Ruralmente, creemos que una vida plena es esencial para una agricultura próspera. Explora cómo nuestros planes, centrados en la salud mental y calidad de vida, están transformando las comunidades agrícolas. ¡Descubre el poder del bienestar en cada surco!</p>
                </div>
                <div class="items-center p-4">
                    <p class="my-2 text-black text-lg"><span class="font-bold">Ruralmente Impacta: </span> Historias Reales de Cambio Social en el Agro</p>
                    <p class="text-justify text-black">Sumérgete en las historias inspiradoras de cambio. Conoce cómo Ruralmente está dejando huella social en el sector agrícola. Desde la reducción de desigualdades hasta la promoción de la sostenibilidad, descubre cómo estamos haciendo que cada cultivo cuente. ¡Únete a la revolución de bienestar y haz una diferencia real en el agro!</p>
                </div>
        </article>
    </section>
 
    <x-footer />

    <!-- <iframe id="Modal" class="modal flex bg-black bg-opacity-30 items-center justify-center fixed z-50 top-0 left-0 h-[100vh] w-[100vw]" src="/src/Formularios/Formulario_inicio.html" frameborder="0"></iframe> -->
    <script src="src/js/modalLogin.js"></script>
    <script src="src/js/modalRegister.js"></script>
    <!-- <script src="src/js/validacion_registro.js"></script> -->
    <script>
        // // Obtén una referencia al enlace
        const navbottom = document.getElementById("navbottom");
        const logo = document.getElementById("logo");
        const inst = document.getElementById("inst");
        const avatar = document.getElementById("avatar");

        // Agrega un evento para detectar el scroll
        window.addEventListener("scroll", () => {
            // Obtén la posición actual de desplazamiento vertical
            const scrollY = window.scrollY;

            // Define una posición de desplazamiento en la que quieres que cambie el color
            const scrollThreshold = 1000; // Cambia esto según tus necesidades

            // Verifica si el desplazamiento ha alcanzado el umbral
            if (scrollY >= scrollThreshold) {
                // Agrega la clase "scroll" para cambiar el color
                navbottom.classList.add("scroll");
            } else {
                // Elimina la clase "scroll" para volver al color original
                navbottom.classList.remove("scroll");
            }
        });
    </script>
</div>
