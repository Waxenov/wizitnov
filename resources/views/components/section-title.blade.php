<div class="flex justify-start">
    <div>
        <h1 class="tablet:text-2xl minimal:text-xl font-big text-coffee">{{ $title }}</h1>

        <h2 class="mt-1 tablet:text-lg minimal:text-base text-coffee font-base">
            {{ $description }}
        </h2>
    </div>

    <div class="font-base">
        {{ $aside ?? '' }}
    </div>
</div>
