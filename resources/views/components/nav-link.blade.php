@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-flex items-center px-1 pt-1 border-b-2 border-teal-950 text-sm font-extrabold leading-5 text-gray-700 focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out'
            : 'inline-flex hover:bg-teal-900 rounded-md px-2 py-2 mx-1 items-center text-sm font-medium leading-5 text-gray-100 hover:text-gray-200 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
