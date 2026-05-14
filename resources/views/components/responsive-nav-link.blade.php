@props(['active'])

@php
$classes = ($active ?? false)
? 'block w-full text-center laptop:text-2xl font-thin tablet:text-2xl mobile:text-2xl minimal:text-xl border-b-4 border-b-milano font-pix text-milano border-b-4 border-b-milano hover:border-brownpaper focus:border-hipnymph transition duration-200 ease-in-out'
: 'block w-full text-center laptop:text-2xl font-thin tablet:text-2xl mobile:text-2xl minimal:text-xl font-pix text-coffee hover:text-brownpaper focus:outline-none focus:text-hipnymph transition duration-200 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>