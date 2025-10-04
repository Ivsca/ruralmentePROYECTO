<x-guest-layout>
    <x-navbar-welcome :seeButton="2" :register=false />

    <div class="mt-20 flex flex-col items-center">
        <div class="bg-gray-200 w-2/3 rounded-md my-3 p-2 flex gap-2 shadow-md shadow-slate-400">
            <img class="w-[40vh] h-[40vh] object-cover rounded-md" src="{{asset('fondos_imagenes_video/pasos_cafe.jpg')}}" alt="imagen de la noticia">
            <div class="w-10/12 mt-10">
                <p class="text-xl"><span class="font-bold">Desata la Productividad:</span> Secretos Revelados</p>
                <p class="py-4">¡Prepárate para transformar tu cosecha! En Ruralmente, desvelamos los secretos para potenciar la productividad agrícola. Descubre cómo nuestros servicios innovadores y planes personalizados están llevando a las empresas agroalimentarias a nuevos niveles de eficiencia. ¡Aumenta tu rendimiento y cosecha el éxito con nosotros!</p>
            </div>
        </div>
        {{-- noticia numero 2 --}}
        <div class="bg-gray-200 w-2/3 rounded-md my-3 p-2 flex shadow-md shadow-slate-400 gap-2">
            <div class="w-10/12 mt-10">
                <p class="text-xl"><span class="font-bold">Bienestar en el Agro:</span> El Eslabón Perdido para la Calidad de Vida</p>
                <p class="py-4"><span class="font-semibold">¿Imaginas un entorno agrícola donde el bienestar es la clave?</span> En Ruralmente, creemos que una vida plena es esencial para una agricultura próspera. Explora cómo nuestros planes, centrados en la salud mental y calidad de vida, están transformando las comunidades agrícolas. ¡Descubre el poder del bienestar en cada surco!</p>
            </div>
            <img class="w-[40vh] h-[40vh] object-cover rounded-md" src="{{asset('fondos_imagenes_video/pasos_cafe.jpg')}}" alt="imagen de la noticia">
        </div>
        <div class="bg-gray-200 w-2/3 rounded-md my-3 p-2 flex shadow-md shadow-slate-400 gap-2">
            <img class="w-[40vh] h-[40vh] object-cover rounded-md" src="{{asset('fondos_imagenes_video/pasos_cafe.jpg')}}" alt="imagen de la noticia">
            <div class="w-10/12 mt-10">
                <p class="text-xl"><span class="font-bold">Ruralmente Impacta: </span> Historias Reales de Cambio Social en el Agro</p>
                <p class="py-4">Sumérgete en las historias inspiradoras de cambio. Conoce cómo Ruralmente está dejando huella social en el sector agrícola. Desde la reducción de desigualdades hasta la promoción de la sostenibilidad, descubre cómo estamos haciendo que cada cultivo cuente. ¡Únete a la revolución de bienestar y haz una diferencia real en el agro!</p>
            </div>
        </div>
    </div>
    <x-footer/>
</x-guest-layout>
