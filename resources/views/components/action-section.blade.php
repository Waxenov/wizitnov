<div {{ $attributes->merge(['class' => 'tablet:grid tablet:grid-cols-3 tablet:gap-6']) }}>
    <x-section-title>
        <x-slot name="title">{{ $title }}</x-slot>
        <x-slot name="description">{{ $description }}</x-slot>
    </x-section-title>

    <div>
        <div class="px-4 py-5">
            {{ $content }}
        </div>
    </div>
</div>
