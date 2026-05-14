@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-flex justify-center items-center laptop:text-3xl text-xl font-pix leading-relaxed border-b-4 border-b-coffee text-coffee hover:text-milano hover:border-b-milano focus:outline-none transition duration-200 ease-in-out'
            : 'inline-flex justify-center items-center laptop:text-3xl text-xl font-pix leading-relaxed text-coffee hover:text-milano focus:outline-none focus:text-milano transition duration-200 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
