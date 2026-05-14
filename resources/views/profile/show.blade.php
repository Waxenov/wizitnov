<x-app-layout>

    <div>
        <div class="max-w-7xl mx-auto py-10 px-6">
            @livewire('profile.update-profile-information-form')

            <x-section-border />

            <div class="mt-10">
                @livewire('profile.update-password-form')
            </div>

            <x-section-border />

            <div class="mt-10">
                <h1 class="font-big text-2xl text-coffee">{{ __('Выход из аккаунта') }}</h1>
                <div class="py-4 grid gap-6">

                    <div class="mt-5 col-span-2 font-base">
                        <form method="POST" action="{{ route('logout') }}" x-data>
                            @csrf
                            <x-button href="{{ route('logout') }}" @click.prevent="$root.submit();">
                                {{ __('Выйти') }}
                            </x-button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>