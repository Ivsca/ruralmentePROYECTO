@props(['for'])

@error($for)
    <p {{ $attributes->merge(['class' => 'text-sm text-red-600 bg-red-100 w-72 my-2 px-2 rounded-md']) }}>{{ $message }}</p>
@enderror
