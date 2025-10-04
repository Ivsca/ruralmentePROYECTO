<div>
    <button class="py-2 px-4 rounded-full hover:bg-opacity-30 hover:bg-gray-100 text-gray-300 absolute bottom-5 left-10 hover:text-white" wire:click="previous" class="p-4"><i class="fa-solid fa-chevron-left"></i></button>

    <div class="flex items-center justify-center">
        <div class=" w-full h-72">
            <img  class="w-full h-full object-cover" src="{{ asset($images[$active]) }}" alt="Imagen del carrusel">
        </div>
    </div>
    <button class="py-2 px-4 rounded-full hover:bg-opacity-30 hover:bg-gray-100 text-gray-300 absolute bottom-5 right-10 hover:text-white" wire:click="next" class="p-4"><i class="fa-solid fa-angle-right"></i></button>
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            setInterval(() => {
                @this.call('next');
            }, 5000) // Cambia cada 5 segundos
        });
    </script>
</div>
