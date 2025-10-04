<x-guest-layout>
    <x-navbar-welcome :seeButton="2" :register=false/>

    <main class="w-full flex flex-col items-centermt mt-20">
        <div class="bg-cover bg-center bg-gray-200 w-full h-72 flex items-center justify-center bg-[url(/Public/fondos_imagenes_video/paisaje.jpg)]">
            <div class="w-7/12 bg-black bg-opacity-70 p-3 rounded-md text-white">
                <p class="text-2xl font-extrabold">Café de productores felices</p>
                <p class="font-semibold">¿Has disfrutado alguna vez un café que no solo despierte tus sentidos, sino que también apoye la salud mental de quienes lo cultivan?</p>
                <hr class="border-white">
                <p class="my-2 ">Descubre la historia detrás de cada taza. Nuestro café tostado es el fruto del esfuerzo de agricultores comprometidos con su salud mental, respaldados por los servicios innovadores de Ruralmente</p>
            </div>
        </div>
        <div class="mt-5">
        </div>
        <article class="flex gap-5 justify-center mt-2 mb-4">
                @livewire('cards-products')
        </article>
    </main>

    <div class="bottom-0 ">
        <x-footer />
    </div>
</x-guest-layout>

