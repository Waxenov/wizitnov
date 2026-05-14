<footer id="footer" class="flex bg-brownpaper border-dashed border-t-4 border-t-oldpaper bottom-0 w-full top-0 z-10">
    <div class="laptop:mx-auto w-full laptop:p-4 p-2 pt-4 laptop:text-xl tablet:text-base minimal:text-base">
        <div class="flex justify-between laptop:gap-5 mobile:ps-4 minimal:ps-2 items-center mb-4 gap-4">

            <!-- Logo -->
            <div class="flex tablet:flex-row minimal:flex-col items-center justify-center gap-4">
                <x-logotype class="tablet:w-12 minimal:w-8" />
                <div id="theme">
                    <button id="logo-theme" class="flex justify-center text-center items-center tracking-widest px-2 py-1 border-4 border-milano hover:border-milano font-pix tablet:text-2xl minimal:text-xl text-milano bg-oldpaper hover:bg-milano hover:text-oldpaper focus:outline-none transition ease-in-out duration-200">
                        {{ __('тема') }}
                    </button>
                </div>
            </div>

            <!-- Documents -->
            <div>
                <ul class="text-coffee font-big">
                    <li class="mb-4">
                        <a href="{{ route('terms') }}" class="hover:underline">
                            {{ __('Пользовательское соглашение') }}
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('policy') }}" class="hover:underline">
                            {{ __('Политика конфиденциальности') }}
                        </a>
                    </li>
                </ul>
            </div>

        </div>

        <!-- Copyright -->
        <div class="flex tablet:justify-start minimal:justify-center text-coffee items-center laptop:text-xl tablet:text-base minimal:text-sm font-big">
            <h1>{{ __('© Copyright 2024.') }}</h1>
        </div>
    </div>
</footer>