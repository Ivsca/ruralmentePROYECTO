<x-guest-layout>
    {{-- teal-700
#ECE8DD cafe
#073b17 verde --}}
    <x-navbar-welcome :seeButton="2" :register=false />

    <main class="w-full flex flex-col items-center ">
        <div
            class="w-full h-96 top-11/12 bg-cover bg-center shadow-lg shadow-gray-400 bg-white bg-[url(/Public/fondos_imagenes_video/paisaje.jpg)]">
            <div class="w-1/2 mx-auto flex flex-col justify-center items-center h-full ">
                <div class="bg-black bg-opacity-80 p-3 rounded-lg">
                    <div class=" text-white text-2xl font-bold px-4 py-2">Merca Rural: Bienestar en Cada Paso</div>
                    <p class="my-2 font-medium text-white">¿Te has preguntado cómo el agroturismo puede ser una
                        herramienta para el bienestar de los agricultores? Descúbrelo con Merca Rural</p>
                    <article class="mt-6">
                        <div class="bg-white h-[1px] my-3"></div>
                        <p class="font-bold text-white">Descubre la historia detrás de cada taza. Nuestro café tostado es el fruto
                            del esfuerzo
                            de agricultores comprometidos con su salud mental, respaldados por los servicios</p>
                    </article>
                </div>
            </div>
        </div>

        <div class=" w-11/12 mt-5 grid grid-cols-2  gap-3">

            <div class="flex p-2 bg-gray-200 rounded-lg gap-2 shadow-md shadow-gray-400 my-3">
                <img class="alturaImage object-cover rounded-md w-1/3 h-1/3" src="{{ asset('Sello_Rural_Mente_Negro.png') }}"
                    alt="image">

                <div class="flex flex-col justify-around items-end">
                    <p class="">
                        interactua y ten una buena experiencia en agroturismo donde tendremos
                        unas maravillosas aventuras con nuestros agricultores
                    </p>

                    <div>
                        <a class="bg-teal-700 p-2 rounded-md shadow-lg shadow-gray-400 text-white"
                            href="{{ route('triaje') }}">Agroturismo....</a>
                    </div>
                </div>
            </div>
            {{-- segunda carta --}}
            <div class="flex p-2 bg-gray-200 rounded-lg gap-2 shadow-md shadow-gray-400">

                <img class="alturaImage object-cover rounded-md" src="{{ asset('fondos_imagenes_video/1.jpeg') }}"
                    alt="image">

                <div class=" flex flex-col justify-around items-end">
                    <p class="">
                        Deja bolar tu mente con la maravila de los sabores y culturas que se pueden encontrar en campo,
                        ¿no crees que es maravilloso participar en uno de nuestros talleres?
                    </p>

                    <div>
                        <a class="bg-teal-700 p-2 rounded-md shadow-lg shadow-gray-400 text-white"
                            href="{{ route('productos.perchas') }}">Talleres &
                            cursos</a>
                    </div>
                </div>
            </div>
        </div>
       
        {{-- <x-carrousel-demostrativo /> --}}
        {{-- <x-carrousel-practico /> --}}
    </main>

    <x-footer />
    <script>
        const scrollContainer = document.getElementById('scrollContainer');
        const scrollContainerTwo = document.getElementById('scrollContainerTwo');
        const scrollContainerThree = document.getElementById('scrollContainerThree');

        function miScrollLeft() {
            scrollContainer.scrollLeft -= 300;
        }

        function miScrollRight() {
            scrollContainer.scrollLeft += 300;
        }


        function miTwoScrollLeft() {
            scrollContainerTwo.scrollLeft -= 300;
        }

        function miTwoScrollRight() {
            scrollContainerTwo.scrollLeft += 300;
        }


        function miThreeScrollLeft() {
            scrollContainerThree.scrollLeft -= 300;
        }

        function miThreeScrollRight() {
            scrollContainerThree.scrollLeft += 300;
        }
    </script>

</x-guest-layout>
