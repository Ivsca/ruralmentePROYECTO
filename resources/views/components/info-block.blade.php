@props(['title', 'icon', 'bgIcon', 'gradient', 'text'])

<div class="bg-white rounded-xl p-6 shadow-md hover:shadow-lg transition-all duration-500 transform hover:-translate-y-2 border border-gray-100 relative overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-br {{ $gradient }} opacity-30"></div>
    <div class="relative z-10">
        <!-- Ícono más pequeño y pastel -->
        <div class="w-12 h-12 rounded-full flex items-center justify-center mb-4 mx-auto" style="background-color: {{ $bgIcon }};">
            <i class="{{ $icon }} text-white text-2xl"></i>
        </div>
        <h3 class="text-2xl font-serif font-bold text-[#35452B] text-center mb-4">{{ $title }}</h3>
        <p class="text-gray-700 leading-relaxed text-sm text-center">{{ $text }}</p>
    </div>
</div>
