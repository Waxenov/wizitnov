@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-big tablet:text-xl minimal:text-lg text-coffee']) }}>
    {{ $value ?? $slot }}
</label>
