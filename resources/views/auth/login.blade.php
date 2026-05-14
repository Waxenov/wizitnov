<x-guest-layout>
    <x-authentication-card>

        <div class="flex justify-center items-center pb-10 landscape:pt-14">
            <a href="{{ route('welcome') }}" class="flex flex-row justify-start gap-2 items-center z-50 cursor-pointer">
                <x-logotype class="w-12" />
                <h1 class="font-pix text-coffee text-4xl">ГрузоМагистр</h1>
            </a>
        </div>

        <!-- message errors -->
        <x-validation-errors class="mb-4" />

        @if (session('status'))
        <div>
            {{ session('status') }}
        </div>
        @endif

        <!-- form login -->
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="block">
                <label for="login" class="font-pix minimal:text-2xl text-coffee"> {{ __('Электропочта') }} </label>
                <input id="login" class="w-full bg-brownpaper/50 focus:bg-oldpaper focus:border-dashed focus:text-coffee text-coffee text-xl font-big border-4 border-coffee focus:border-coffee focus:ring-0" type="email" name="login" :value="old('login')" autocomplete="off" required />
            </div>

            <div class="py-4">
                <label for="password" class="font-pix minimal:text-2xl text-coffee"> {{ __('Пароль') }} </label>
                <div class="relative flex-1 col-span-4" x-data="{ show: true }">
                    <input class="w-full bg-brownpaper/50 focus:bg-oldpaper focus:border-dashed focus:text-coffee text-coffee text-xl font-big border-4 border-coffee focus:border-coffee focus:ring-0" :type="show ? 'password' : 'text'" name="password" id="password" minlength="8" required autocomplete="off" />

                    <button type="button" class="flex absolute inset-y-0 right-0 items-center pr-3" @click="show = !show" :class="{'hidden': !show, 'block': show }">
                        <!-- Heroicon name: eye -->
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                    </button>
                    <button type="button" class="flex absolute inset-y-0 right-0 items-center pr-3" @click="show = !show" :class="{'block': !show, 'hidden': show }">
                        <!-- Heroicon name: eye-slash -->
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 001.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.45 10.45 0 0112 4.5c4.756 0 8.773 3.162 10.065 7.498a10.523 10.523 0 01-4.293 5.774M6.228 6.228L3 3m3.228 3.228l3.65 3.65m7.894 7.894L21 21m-3.228-3.228l-3.65-3.65m0 0a3 3 0 10-4.243-4.243m4.242 4.242L9.88 9.88" />
                        </svg>
                    </button>
                </div>
            </div>

            <div class="flex w-full items-center">
                <button class="flex justify-center text-center items-center w-full ms-0 tracking-widest">
                    <h1 id="button" class="flex justify-center text-center items-center w-full ms-0 tracking-widest py-2 bg-milano border-4 border-milano hover:border-milano hover:bg-transparent font-pix mobile:text-2xl minimal:text-xl text-hipnymph hover:text-milano active:bg-milano active:border-milano active:text-hipnymph focus:outline-none transition ease-in-out duration-200">
                        {{ __('Войти') }}
                    </h1>
                </button>
            </div>
        </form>

        <div class="flex flex-row justify-center items-center pt-4">
            <h3 class="font-pix laptop:text-xl tablet:text-xl minimal:text-xl text-milano border-b-4 border-b-transparent"> {{ __('Нет аккаунта?') }} </h3>
            <a class="font-pix laptop:text-xl tablet:text-xl minimal:text-xl text-milano ps-4" href="{{ route('register') }}">
                <h3 id="login" class="hover:text-crimson border-b-4 border-b-transparent hover:border-b-crimson">{{ __('Регистрация') }}</h3>
            </a>
        </div>
    </x-authentication-card>
</x-guest-layout>