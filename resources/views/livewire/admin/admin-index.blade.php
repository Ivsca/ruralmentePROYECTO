<div class="flex">
    <x-sidebar-admin />

    <x-content-admin>
        <article class=" grid grid-cols-3 justify-around gap-4">
            <div class="bg-gray-300 rounded-md shadow-md shadow-slate-300 ">
                <h1 class="text-center text-xl">Agricultores en el sistema</h1>
                <hr class="mx-4 border-gray-500">
                <div class="text-center px-2">
                    <p><span class="text-3xl font-bold">200</span> agricultores nuevos</p>
                </div>
            </div>
            <div class="bg-gray-300 rounded-md shadow-md shadow-slate-300 ">
                <h1 class="text-center text-xl">ESTADO DE VENTA</h1>
                <hr class="mx-4 border-gray-500">
            </div>

            <div class="bg-gray-300 rounded-md shadow-md shadow-slate-300 ">
                <h1 class="text-center text-xl">ESTADO DE VENTA</h1>
                <hr class="mx-4 border-gray-500">
            </div>

        </article>

        <article class="w-full grid grid-cols-4 gap-12 p-4 mt-10">
            <!-- carta numero uno -->
            <a href="{{ route('admin.group') }}"
                class="bg-gray-200 border flex flex-col items-center rounded-lg shadow-xl  p-3 hover:-translate-y-6 duration-500 ease-out hover:rotate-2 cursor-pointer isolate">
                <div class="w-8/12 h-48 object-cover border rounded my-3">
                    <img class=" rounded" src="{{ asset('icon/grupo.png') }}" alt="imagen">
                </div>
                <h1 class="text-lg font-extrabold ">Grupo de trabajo</h1>
            </a>

            <!-- carta numero dos -->
            <a href="{{ route('admin.product') }}"
                class="bg-gray-200 border flex flex-col items-center rounded-lg shadow-xl  p-3 hover:-translate-y-6 duration-500 ease-out hover:rotate-2 cursor-pointer">
                <div class="w-8/12 h-48 object-cover border rounded my-3">
                    <img class=" rounded" src="{{ asset('icon/cafe.png') }}" alt="imagen">
                </div>
                <h1 class="text-lg font-extrabold ">Productos</h1>
            </a>

            <!-- tercera tercera -->
            <a href="{{ route('admin.planes') }}"
                class="bg-gray-200 border flex flex-col items-center rounded-lg shadow-xl  p-3 hover:-translate-y-6 duration-500 ease-out hover:rotate-2 cursor-pointer">
                <div class="w-8/12 h-48 object-cover border rounded my-3">
                    <img class="rounded" src="{{ asset('icon/calendario.png') }}" alt="imagen">
                </div>
                <h1 class="text-lg font-extrabold ">Planes almacigo</h1>
            </a>

            <!-- cuarta carta  -->
            <a href="{{ route('admin.agricultores') }}"
                class="bg-gray-200 border flex flex-col items-center rounded-lg shadow-xl  p-3 hover:-translate-y-6 duration-500 ease-out hover:rotate-2 cursor-pointer">
                <div class="w-8/12 h-48 object-cover border rounded my-3">
                    <img class="rounded" src="{{ asset('icon/taller.png') }}" alt="imagen">
                </div>
                <h1 class="text-lg font-extrabold ">Agricultor</h1>
            </a>

            <!-- quinta carta  -->
            <a href="{{ route('admin.taller') }}"
                class="bg-gray-200 border flex flex-col items-center rounded-lg shadow-xl  p-3 hover:-translate-y-6 duration-500 ease-out hover:rotate-2 cursor-pointer">
                <div class="w-8/12 h-48 object-cover border rounded my-3">
                    <img class="rounded" src="{{ asset('icon/taller.png') }}" alt="imagen">
                </div>
                <h1 class="text-lg font-extrabold ">Turismo</h1>
            </a>

            <!-- sexta carta -->
            <a href=""
                class="bg-gray-200 border flex flex-col items-center rounded-lg shadow-xl  p-3 hover:-translate-y-6 duration-500 ease-out hover:rotate-2 cursor-pointer">
                <div class="w-8/12 h-48 object-cover borderrounded my-3">
                    <img class="rounded" src="{{ asset('icon/investigar.png') }}" alt="imagen">
                </div>
                <h1 class="text-lg font-extrabold ">Categorias</h1>
            </a>

        </article>



    </x-content-admin>
</div>
