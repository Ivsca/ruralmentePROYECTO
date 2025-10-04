<aside class="bg-gray-300 w-[19vw] h-[86vh] lg:h-[92vh]">
    <div class="flex items-center w-full h-32 p-3 border-b-2 border-gray-500 border-dashed">
        <h1 class="text-lg font-extrabold font-display">Bienvenido administrador</h1>
    </div>
    <ul class="mx-3 mt-8">
        @can('admin.group')
            <li class="py-2">
                <a class="text-sm p-2 rounded-md  {{ request()->routeIs('admin.group') ? 'text-white px-3 py-2 bg-black bg-opacity-50 hover:bg-black hover:bg-opacity-50' : 'bg-opacity-50 hover:bg-black hover:bg-opacity-40 px-3' }}"
                    href="{{ route('admin.group') }}"><i class="fa-solid fa-people-group fa-xl"></i></i> Administradores</a>
            </li>
        @endcan
        @can('admin.product')
            <li class="py-2">
                <a class="text-sm p-2 rounded-md {{ request()->routeIs('admin.product') ? 'text-white px-3 py-2 bg-black bg-opacity-50 hover:bg-black hover:bg-opacity-50' : 'bg-opacity-50 hover:bg-black hover:bg-opacity-40 px-3' }}"
                    href="{{ route('admin.product') }}"><i class="fa-solid fa-layer-group"></i> productos</a>
            </li>
        @endcan
        @can('admin.planes')
            <li class="py-2">
                <a class="text-sm p-2 rounded-md {{ request()->routeIs('admin.planes', 'admin.plan.CreatePlan') ? 'text-white px-3 py-2 bg-black bg-opacity-50 hover:bg-black hover:bg-opacity-50' : 'bg-opacity-50 hover:bg-black hover:bg-opacity-40 px-3' }}"
                    href="{{ route('admin.planes') }}"><i class="fa-solid fa-table-cells"></i> Planes almacigo</a>
            </li>
        @endcan
        @can('admin.agricultores')
            <li class="py-2">
                <a class="text-sm p-2 rounded-md {{ request()->routeIs('admin.agricultores', 'admin.agricultor.createAgricultor') ? 'text-white px-3 py-2 bg-black bg-opacity-50 hover:bg-black hover:bg-opacity-50' : 'bg-opacity-50 hover:bg-black hover:bg-opacity-40 px-3' }}"
                    href="{{ route('admin.agricultores') }}"><i class="fa-solid fa-users"></i> Agricultor</a>
            </li>
        @endcan
        @can('admin.taller')
            <li class="py-2">
                <a class="text-sm p-2 rounded-md {{ request()->routeIs('admin.taller') ? 'text-white px-3 py-2 bg-black bg-opacity-50 hover:bg-black hover:bg-opacity-50' : 'bg-opacity-50 hover:bg-black hover:bg-opacity-40 px-3' }}"
                    href="{{ route('admin.taller') }}"><i class="fa-brands fa-envira"></i> Turismo</a>
            </li>
        @endcan
        @can('admin.categories')
            <li class="py-2">
                <a class="text-sm p-2 rounded-md {{ request()->routeIs('admin.categories') ? 'text-white px-3 py-2 bg-black bg-opacity-50 hover:bg-black hover:bg-opacity-50' : 'bg-opacity-50 hover:bg-black hover:bg-opacity-40 px-3' }}"
                    href="{{ route('admin.categories') }}"><i class="fa-solid fa-square-poll-vertical"></i> Categorias</a>
            </li>
        @endcan
        <li class="py-2">
            <a class="text-sm p-2 rounded-md {{ request()->routeIs('agendaAdmin') ? 'text-white px-3 py-2 bg-black bg-opacity-50 hover:bg-black hover:bg-opacity-50' : 'bg-opacity-50 hover:bg-black hover:bg-opacity-40 px-3' }}"
                href="{{ route('agendaAdmin') }}"><i class="fa-solid fa-square-poll-vertical"></i> Talleres
                agendados</a>
        </li>
    </ul>
</aside>
