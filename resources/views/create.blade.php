<x-app-layout>
    <div class="laptop:pt-10 tablet:pt-0">
        <div class="max-w-7xl mx-auto pb-10">

            <!-- заголовок страницы и описание -->
            <div class="laptop:flex tablet:hidden minimal:hidden justify-between items-center mb-10 ms-0 minimal:px-2">
                <h1 class="font-big text-4xl text-coffee">
                    {{ __('Новый заказ') }}
                </h1>
                @if (Auth::check())
                <a href="{{ route('orders') }}" class="text-milano hover:text-brownpaper items-center text-4xl font-big text-center">
                    <h3 id="login" class="text-milano hover:text-brownpaper items-center text-4xl font-big text-center">
                        {{ __('К заказам') }}
                    </h3>
                </a>
                @else
                <a href="{{ route('orderscustomer') }}" class="text-milano hover:text-brownpaper items-center text-4xl font-big text-center">
                    <h3 id="login" class="text-milano hover:text-brownpaper items-center text-4xl font-big text-center">
                        {{ __('К заказам') }}
                    </h3>
                </a>
                @endif
            </div>

            <div class="laptop:hidden tablet:flex minimal:flex minimal:flex-row justify-between minimal:mb-10 minimal:mt-4 ms-0 minimal:px-2">
                <h1 class="font-big minimal:text-2xl tablet:text-4xl text-coffee">
                    {{ __('Новый заказ') }}
                </h1>
                @if (Auth::check())
                <a href="{{ route('orders') }}" class="text-milano hover:text-brownpaper items-center minimal:text-2xl tablet:text-4xl font-big text-center">
                    <h3 id="login" class="text-milano hover:text-brownpaper items-center minimal:text-2xl tablet:text-4xl font-big text-center">
                        {{ __('К заказам') }}
                    </h3>
                </a>
                @else
                <a href="{{ route('orderscustomer') }}" class="text-milano hover:text-brownpaper items-center minimal:text-2xl tablet:text-4xl font-big text-center">
                    <h3 id="login" class="text-milano hover:text-brownpaper items-center minimal:text-2xl tablet:text-4xl font-big text-center">
                        {{ __('К заказам') }}
                    </h3>
                </a>
                @endif
            </div>

            <!-- заголовок блока -->
            <div id="zag" class="bg-brownpaper/30 w-full tablet:px-10 minimal:px-2">
                <!-- форма создания заказа -->
                <livewire:OrderComponent>
            </div>
        </div>
    </div>
</x-app-layout>