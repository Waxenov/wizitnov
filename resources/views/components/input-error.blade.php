@props(['for'])

@error($for)
    <p {{ $attributes->merge(['class' => 'text-lg font-base text-crimson']) }}>{{ $message }}</p>
@enderror
