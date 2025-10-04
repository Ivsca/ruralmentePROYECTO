<x-guest-layout>

    <x-navbar-welcome :seeButton="2" :register=false/>

      <!-- contenedor para la informacion -->

      <main class="top-11/12">
        <!-- quienes somos -->
        <section
          class="w-full h-96 bg-cover bg-center bg-white bg-[url(/Public/fondos_imagenes_video/Fondo_atardecer.jpg)]">
          <div class="flex flex-col justify-center w-1/2 h-full mx-auto">
            <h1 class="text-5xl text-white font-display">Quienes Somos?</h1>
            <p class="mt-2 text-white font-body">
              <strong>Ruralmente</strong> es una empresa que impulsa el éxito personal y
              laboral de los agricultores colombianos, con atención
              psicosocial especializada y el uso de tecnología avanzada,
              para la mejora de su productividad, satisfacción laboral,
              relaciones comerciales, y bienestar
            </p>
          </div>
        </section>

        <!-- cultura rural -->

        <section class="mt-16">
          <article class="grid w-2/3 grid-cols-2 mx-auto">
            <div class="flex p-4">
              <hr class="w-3 h-full mr-4 bg-gray-300 rounded-lg">
              <div>
                <h1 class="text-3xl font-display">Misión</h1>
                <p class="font-body">
                  Nuestra misión es más que palabras, es un compromiso emocional. Visualiza un agro donde la salud mental es prioridad. Eso es lo que hacemos en Ruralmente
                </p>
              </div>
            </div>

            <div class="flex p-4 ">
              <hr class="w-3 h-full mr-4 bg-gray-300 rounded-lg">
              <div>
                <h1 class="text-3xl font-display">Visión</h1>
                <p class="font-body">
                  Convertirnos en la referencia mundial en el cuidado de la salud mental en el ámbito agrícola, marcando un impacto positivo en cada vida que tocamos.
                </p>
              </div>
            </div>
          </article>

          <!-- segundo articulo donde estta valores -->
          <article class="flex justify-center w-1/2 mx-auto mt-10">
            <div class="flex p-4 ">
              <hr class="w-2 h-full mr-4 bg-gray-300 rounded-lg">
              <div>
                <h1 class="text-3xl font-display">Valores</h1>
                <p class="font-body">
                  Nuestra ética corporativa impulsa la igualdad y el bienestar a través de la empatía, la innovación y un firme compromiso con el propósito de mejorar la vida de los demás.
                </p>
              </div>
            </div>
          </article>
          <div class="flex flex-col items-center mt-20">
            <h1 class="text-5xl font-display ">¿Que hacemos nosotros?</h1>
            <div class="bg-black w-3/4 h-[1px] my-3"></div>
            <p class="w-3/4 text-center font-body">¿Te gustaría saber exactamente qué hacemos para mejorar la salud mental en el agro? Permítenos mostrarte cómo cada paso que damos marca la diferencia.</p>
          </div>

          <!-- que hacemos nosotros -->
          <article class="flex flex-col items-center w-full">

            <div class="grid w-3/4 grid-cols-2 mt-5">
              <div
                class="p-4 m-6 duration-500 ease-out bg-gray-100 shadow-lg hover:-translate-y-6 hover:rotate-2 shadow-slate-300 rounded-xl">
                <h1 class="m-4 text-2xl font-display"></h1>
                <p class="font-body"><span class="text-lg font-extrabold">Atención Integral en Salud Mental: </span>Proporcionamos servicios especializados para mejorar la salud mental en el sector agrícola. Desde la identificación de áreas afectadas hasta la conexión con profesionales a través de nuestra red de apoyo, nos enfocamos en brindar una atención integral.</p>
              </div>
              <!-- primera carta -->
              <div
                class="p-4 m-6 duration-500 ease-out bg-gray-100 shadow-lg hover:-translate-y-6 hover:-rotate-2 shadow-slate-300 rounded-xl">
                <h1 class="m-4 text-2xl font-display"></h1>
                <p class="font-body"><span class="text-lg font-extrabold">Planes Personalizados para Empresas Agro:</span> Desarrollamos planes adaptados a las necesidades de medianas y grandes empresas del sector agroalimentario, agropecuario y agroindustrial. Nuestros planes, como el Plan Semilla, Plan Cosecha y Plan Finca, abordan específicamente los desafíos del entorno laboral agrícola.</p>
              </div>
              <!-- segunda -->
              <div
                class="p-4 m-6 duration-500 ease-out bg-gray-100 shadow-lg hover:-translate-y-6 hover:rotate-2 shadow-slate-300 rounded-xl">
                <h1 class="m-4 text-2xl font-display"></h1>
                <p class="font-body"><span class="text-lg font-extrabold">Uso Innovador de Tecnologías:</span> Incorporamos tecnologías innovadoras, como Alma (nuestro chatbot por WhatsApp), para optimizar la identificación de áreas de vida afectadas, geolocalizar usuarios y mapear rutas de atención. Buscamos siempre estar a la vanguardia en la mejora del bienestar.</p>
              </div>
              <div
                class="p-4 m-6 duration-500 ease-out bg-gray-100 shadow-lg hover:-translate-y-6 hover:-rotate-2 shadow-slate-300 rounded-xl">
                <h1 class="m-4 text-2xl font-display"></h1>
                <p class="font-body"><span class="text-lg font-extrabold">Promoción de la Sostenibilidad y Bienestar:</span> Nuestro enfoque va más allá de la salud mental. Trabajamos para promover la sostenibilidad, el bienestar y la igualdad en el sector agrícola. Nos esforzamos por ser agentes de cambio positivo en todas las comunidades agrícolas que servimos.</p>
              </div>

            </div>
          </article>

          <!-- como lo hacemos -->

          <article class="flex flex-col items-center w-full h-auto">
            <div class="flex flex-col items-center m-auto">
              <h1 class="mt-8 text-5xl font-display">¿Como lo hacemos?</h1>
              <hr class="w-80 h-[1px] bg-slate-700 my-5"/>
            </div>
            <!-- video y descripcion de que es lo que hacemos  -->
            <div class="flex items-center w-3/4 p-8">
              <!-- para el video -->
              <div class="w-1/2 ">
                <video controls src=" {{ asset('videos/2023_06_05_11_15_IMG_8636.mp4') }}"
                  class="shadow-2xl rounded-3xl shadow-slate-600"></video>
              </div>

              <!-- la descripcion del video -->
              <div class="w-1/2 p-5 f">
                <p class="text-justify">Con el Plan Semilla, Plan Cosecha y Plan Finca, combinamos servicios de Alma, teleasistencia y días de campo grupales para abordar integralmente las necesidades de tu equipo. </p>
              </div>
            </div>
          </article>

          <!-- planes almacigo -->
          <article id="planes" class="flex flex-col items-center w-full h-auto">


            <div class="flex justify-around w-3/4 p-3 md:w-11/12 sm:w-full">
              <!-- lado derecho -->
              <div class="flex flex-col items-center justify-center w-1/3 p-4 ">
                <div class="flex flex-col items-center justify-center">
                  <h1 class="p-4 text-3xl font-display">Planes almácigo</h1>
                  <p class="text-justify">
                    Imagina ser un agricultor con acceso a una plataforma que no solo optimiza la productividad sino que también cuida tu bienestar. Esto es Almácigo
                  </p>
                </div>
                <div class="flex justify-between w-full mt-4">
                  <a class="bg-[#35452B] hover:bg-[#010201] text-white p-2 rounded-lg " href="#">Terminos y condiciones</a>
                  <a class="bg-[#35452B] hover:bg-[#31551b] text-white p-2 rounded-lg " href="#">Politicas de seguridad</a>
                </div>
              </div>

              <!-- lado izquierdo -->
              <div class="flex items-end justify-center w-1/2 ">
                <div class="w-1/2 p-4 m-8 list-none bg-gray-100 shadow-sm shadow-gray-200 rounded-xl">
                  <h1 class="p-4 mb-4 text-5xl text-center font-display">Plan Semilla</h1>
                  <li class="flex items-center my-3"><img class="w-9" src="{{ asset('icon/Planes_almacigo/agricultor.png') }}" alt="">
                    <p class="ml-2 font-display">1 producto</p>
                  </li>
                  <li class="flex items-center my-3"><img class="w-9" src="{{ asset('icon/Planes_almacigo/bot.png') }}" alt="">
                    <p class="ml-2 text-start">Platadorma almácigo</p>
                  </li>
                  <li class="flex items-center my-3"><img class="w-9" src="{{ asset('icon/Planes_almacigo/servicio-al-cliente.png') }}"
                      alt="">
                    <p class="ml-2">4 Sesiones</p>
                  </li>

                </div>
                <!-- plan cosecha  -->
                <div class="w-1/2 p-5 m-8 list-none bg-gray-100 shadow-sm shadow-gray-200 rounded-xl">
                  <h1 class="mb-4 text-5xl text-center font-display">Plan Cosecha</h1>
                  <div class="my-8">
                    <li class="flex items-center my-3 text-lg font-display"><img class="w-12 mr-2" src="{{ asset('icon/Planes_almacigo/campesinos_grup.png') }}" alt="">10-30 productores</li>
                    <li class="flex items-center my-3"><img class="mt-3 mr-2 w-9" src="{{ asset('icon/Planes_almacigo/bot.png') }}"
                        alt="">Plataforma Almácigo</li>
                    <li class="flex items-center my-3 text-start"><img class="mr-2 w-9" src="{{ asset('icon/Planes_almacigo/servicio-al-cliente.png') }}" alt="">4 sesiones individuales de telepsicología:</li>
                    <li class="flex items-center my-3 text-start"><img class="mr-2 w-9" src="{{ 'icon/Planes_almacigo/pasador-de-ubicacion.png' }}" alt="">
                      <p>1 día de campo de elección</p>
                      <div class="ml-8">
                    <li class="ml-14">Bienestar Financiera</li>
                    <li class="ml-14">Bienestar agrícola</li>
                    <li class="ml-14">Bienestar Psicosocial</li>
                  </div>
                  </li>
                </div>

              </div>
            </div>
            </div>
          </article>

        </section>

        <x-footer />
      </main>

</x-guest-layout>
