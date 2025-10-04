@props(['value'])

<label {{ $attributes->merge(['class' => 'block text-sm text-black text-left']) }}>
    {{ $value ?? $slot }}
</label>
