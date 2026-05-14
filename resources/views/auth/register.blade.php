<x-guest-layout>
    <x-authentication-card>

        <div class="flex justify-center items-center pb-10 landscape:pt-14">
            <a href="{{ route('welcome') }}" class="flex flex-row justify-start gap-2 items-center z-50 cursor-pointer">
                <x-logotype class="w-12" />
                <h1 class="font-pix text-coffee text-4xl">ГрузоМагистр</h1>
            </a>
        </div>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="block">
                <label for="login" class="font-pix minimal:text-2xl text-coffee"> {{ __('Электропочта') }} </label>
                <input id="login" class="w-full bg-brownpaper/50 focus:bg-oldpaper focus:border-dashed focus:text-coffee text-coffee text-xl font-big border-4 border-coffee focus:border-coffee focus:ring-0" type="email" name="login" :value="old('login')" required />
            </div>

            <div class="mt-4">
                <label for="password" class="font-pix minimal:text-2xl text-coffee"> {{ __('Пароль') }} </label>
                <input id="password" class="w-full bg-brownpaper/50 focus:bg-oldpaper focus:border-dashed focus:text-coffee text-coffee text-xl font-big border-4 border-coffee focus:border-coffee focus:ring-0" type="password" name="password" required />
            </div>

            <div class="mt-4">
                <label for="password" class="font-pix minimal:text-2xl text-coffee"> {{ __('Повтор пароля') }} </label>
                <input id="password_confirmation" class="w-full bg-brownpaper/50 focus:bg-oldpaper focus:border-dashed focus:text-coffee text-coffee text-xl font-big border-4 border-coffee focus:border-coffee focus:ring-0" type="password" name="password_confirmation" required />
            </div>

            <div class="mt-4">
                <label for="role" class="font-pix minimal:text-2xl text-milano"> {{ __('Выбирайте себя') }} </label>
                <div id="role" class="flex flex-row items-center justify-center gap-12 my-4">

                    <div class="role">
                        <input type="radio" id="customer" name="role" value="customer" required />
                        <label for="customer" class="font-pix minimal:text-2xl text-coffee hover:text-zinnwaldite border-b-4 hover:border-b-zinnwaldite px-2 py-2"> {{ __('Заказчик') }} </label>
                    </div>

                    <div class="role">
                        <input type="radio" id="transporter" name="role" value="transporter" required />
                        <label for="transporter" class="font-pix minimal:text-2xl text-coffee hover:text-zinnwaldite border-b-4 hover:border-b-zinnwaldite px-2 py-2"> {{ __('Перевозчик') }} </label>
                    </div>

                </div>
            </div>

            <div class="py-4">
                <label for="terms" class="font-pix minimal:text-2xl text-milano">{{ __('Я соглашаюсь с') }} </label>
                <div class="flex flex-row justify-start items-start">
                    <x-checkbox name="terms" id="terms" class="mt-2" required />
                    <div class="flex flex-col justify-start items-start ms-2">
                        <a id="policy" href="{{ route('policy') }}" class="font-pix laptop:text-xl tablet:text-xl minimal:text-xl text-coffee hover:text-milano">Политика конфиденциальности</a>
                        <a id="terms" href="{{ route('terms') }}" class="font-pix laptop:text-xl tablet:text-xl minimal:text-xl text-coffee hover:text-milano">Пользовательское соглашение</a>
                    </div>
                </div>
            </div>

            <div class="flex w-full items-center">
                <button class="flex justify-center text-center items-center w-full ms-0 tracking-widest">
                    <h1 id="button" class="flex justify-center text-center items-center w-full ms-0 tracking-widest py-2 bg-milano border-4 border-milano hover:border-milano hover:bg-transparent font-pix minimal:text-2xl text-hipnymph hover:text-milano active:bg-milano active:border-milano active:text-hipnymph focus:outline-none transition ease-in-out duration-200">
                        {{ __('Регистрация') }}
                    </h1>
                </button>
            </div>
        </form>
        <div class="flex flex-row justify-center items-center pt-4">
            <h3 class="font-pix laptop:text-xl tablet:text-xl minimal:text-xl text-milano border-b-4 border-b-transparent"> {{ __('Есть аккаунт?') }} </h3>
            <a class="font-pix laptop:text-xl tablet:text-xl minimal:text-xl text-milano ps-4" href="{{ route('login') }}">
                <h3 id="login" class="hover:text-crimson border-b-4 border-b-transparent hover:border-b-crimson">{{ __('Войти') }}</h3>
            </a>
        </div>
    </x-authentication-card>
</x-guest-layout>