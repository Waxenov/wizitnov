@props(['submit'])

<div {{ $attributes->merge(['class' => 'flex flex-col']) }}>
    <x-section-title>
        <x-slot name="title" class="font-big">{{ $title }}</x-slot>
        <x-slot name="description" class="font-base">{{ $description }}</x-slot>
    </x-section-title>

    <div class="mt-5 col-span-2 font-base">
        <form wire:submit="{{ $submit }}">
            <div>
                <div>
                    {{ $form }}
                </div>
            </div>

            @if (isset($actions))
                <div class="flex items-center tablet:justify-end minimal:justify-start py-3">
                    {{ $actions }}
                </div>
            @endif
        </form>
    </div>
</div>
