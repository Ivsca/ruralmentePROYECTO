<div class="w-11/12 bg-gray-300 rounded-md">
    <div class="px-4 py-3 mb-0 border-0 rounded-t">
        <div class="flex flex-wrap items-center">
          <div class="relative flex-1 flex-grow w-full max-w-full px-4">
            <h3 class="text-base font-semibold text-blueGray-700">Mis productos</h3>
          </div>
          <div class="flex-1 flex-grow w-full max-w-full px-4 text-right">
            <button class="px-3 py-1 mb-1 mr-1 text-xs font-bold text-white uppercase transition-all duration-150 ease-linear rounded outline-none bg-emerald-500 active:bg-emerald-700 focus:outline-none">Vaciar carrito</button>
          </div>
        </div>
    </div>

    <table class="items-center w-full bg-transparent border-collapse ">
        <thead>
          <tr>
            <th class="px-6 py-3 text-xs font-bold text-left uppercase border border-l-0 border-r-0 border-gray-100 border-solid whitespace-nowrap">
                          Nombre del producto
                        </th>
          <th class="px-6 py-3 text-xs font-bold text-left uppercase border border-l-0 border-r-0 border-gray-100 border-solid whitespace-nowrap">
                          Cantidad
                        </th>
           <th class="px-6 py-3 text-xs font-bold text-left uppercase border border-l-0 border-r-0 border-gray-100 border-solid whitespace-nowrap">
                          Imagen del producto
                        </th>
          <th class="px-6 py-3 text-xs font-bold text-left uppercase border border-l-0 border-r-0 border-gray-100 border-solid whitespace-nowrap">
                          accion
                        </th>
          </tr>
        </thead>

        <tbody>
          <tr>
            <th class="p-4 px-6 text-xs text-left align-middle border-t-0 border-l-0 border-r-0 whitespace-nowrap text-blueGray-700 ">
              /argon/
            </th>
            <td class="p-4 px-6 text-xs align-middle border-t-0 border-l-0 border-r-0 whitespace-nowrap ">
              4,569
            </td>
            <td class="p-4 px-6 text-xs border-t-0 border-l-0 border-r-0 align-center whitespace-nowrap">
              340
            </td>
            <td class="p-4 px-6 text-xs align-middle border-t-0 border-l-0 border-r-0">
                <button class="p-1 m-1 text-white bg-red-500 rounded-md">Eliminar</button>
                <button class="p-1 m-1 bg-green-500 rounded-md">Comprar</button>
              {{-- <i class="mr-4 fas fa-arrow-up text-emerald-500"></i>
              46,53% --}}
            </td>
          </tr>

        </tbody>

      </table>
</div>
