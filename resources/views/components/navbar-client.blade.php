<nav
        class="max-sm:grid-cols-2 max-sm:justify-between max-sm:h-16 sticky items-center w-[100%] h-24 top-0 bg-teal-700  text-gray-100 grid grid-cols-12 gap-4">
        <ul class="max-sm:col-span-1 col-span-3">
            <img class="max-sm:w-10 max-sm:ml-4 w-16 mx-auto" src="{{asset('logos/Ruralmente café negro.png')}}" alt="imagen">
        </ul>
        <ul class="max-sm:hidden col-span-6">
            <li class="text-center w-full mt-3">
                <input class="w-96 border rounded-lg text-black p-1" placeholder="Buscador" type="text">
            </li>
        </ul>
        <ul class="max-sm:col-span-1 max-sm:-mr-36 col-span-3 flex justify-end ">
            <div class=" w-96 group">
                <a href="#" class="max-sm:mr-2 max-sm:text-lg text-xl font-semibold flex justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" height="1.5em"
                        viewBox="0 0 448 512">
                        <path
                            d="M0 96C0 78.3 14.3 64 32 64H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 128 0 113.7 0 96zM0 256c0-17.7 14.3-32 32-32H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32c-17.7 0-32-14.3-32-32zM448 416c0 17.7-14.3 32-32 32H32c-17.7 0-32-14.3-32-32s14.3-32 32-32H416c17.7 0 32 14.3 32 32z" />
                    </svg>
                </a>
                <div id="navbottom"
                    class="max-sm:left-0 max-sm:w-full max-md:left-0 max w-64 py-2 h-[300px] hidden absolute group-hover:flex flex-col justify-center text-black group-hover:bg-gray-300 backdrop-blur-md group-hover:bg-opacity-60 p-4 rounded-lg">
                    <input class="max-sm:block max-sm:w-full max-md:block hidden w-96 border rounded-lg text-black p-1 " placeholder="Buscador" type="text">
                    <a class="max-sm:my-4 max-sm:block text-lg hidden" href="#"><i class="fa-solid fa-cart-shopping fa-xl" style="color: #000000;"></i> Mis compras</a>
                    <a class="text-lg my-4" href=""><i class="fa-solid fa-user fa-lg mr-3"></i> perfil</a>
                    <a class="text-lg my-4" href="#"><i class="fa-solid fa-gear fa-lg mr-3"></i> Configuración</a>
                    <a class="text-lg my-4" href="#"><i class="fa-solid fa-right-to-bracket mr-3"></i>Cerrar Sesion</a>
                </div>
            </div>
        </ul>
    </nav>
