<x-app-layout>
    <div class="max-w-5xl mx-auto pt-10 ">
        <section id="card">
            <div class="grid grid-cols-2 items-center bg-milano p-4">
                <h1 class="tablet:text-4xl minimal:text-3xl font-pix tracking-tight text-start text-oldpaper">
                    Заказ
                    <a href="{{ route('showdemo') }}" class="hover:bg-crimson hover:underline px-2">#0</a>
                </h1>
                <h1 class="tablet:text-4xl minimal:text-3xl font-pix tracking-tight text-end text-oldpaper">
                    Заказчик
                    <a href="{{ route('profiledemo') }}" class="hover:bg-crimson hover:underline px-2">#0</a>
                </h1>
            </div>
            <div id="dashboardbg" class="p-4 bg-brownpaper/30">
                <div class="text-start items-center">
                    <div class="items-center">

                        <!--для заказчика -->
                        <div class="grid grid-cols-2 items-center">
                            <div id="dashboard" class="grid grid-cols-2 items-center bg-oldpaper p-4 mb-4 mr-4">
                                <h1 class="font-big items-center laptop:text-2xl minimal:text-xl text-coffee"> {{ __('Цена') }}</h1>
                                <h2 class="flex justify-end font-base items-center laptop:text-xl minimal:text-lg text-coffee"> нет </h2>
                            </div>
                            <div id="dashboard" class="grid grid-cols-1 items-center bg-oldpaper p-4 mb-4">
                                <h3 class="font-big items-center laptop:text-2xl minimal:text-xl text-milano"> {{ __('Ожидает принятия') }}</h3>
                            </div>
                        </div>

                        <div class="grid grid-cols-2 items-center">
                            <div id="dashboard" class="grid tablet:grid-cols-2 minimal:grid-rows-1 items-center bg-oldpaper p-4 mb-4 mr-4">
                                <h1 class="font-big items-center laptop:text-2xl minimal:text-xl text-coffee"> {{ __('Перевозчик') }}</h1>
                                <h2 class="flex justify-end font-base items-center laptop:text-xl minimal:text-lg text-coffee"> {{ __('не найден') }} </h2>
                            </div>
                            <div id="dashboard" class="grid grid-cols-2 items-center bg-oldpaper p-4 mb-4">
                                <h1 class="font-big items-center laptop:text-2xl minimal:text-xl text-coffee"> {{ __('Статус') }}</h1>
                                <div class="flex justify-end items-center">
                                    <span class="flex flex-row gap-x-2 items-center justify-center">
                                        <h3 class="tablet:block minimal:hidden font-pix items-center text-3xl text-milano">{{ __('ожидание') }}</h3>
                                        <x-status-processing class="h-7 w-7" />
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="grid grid-cols-2 items-center">
                            <div id="dashboard" class="grid grid-cols-2 items-center bg-oldpaper p-4 mb-4 mr-4">
                                <h1 class="font-big items-center laptop:text-2xl minimal:text-xl text-coffee"> {{ __('Тип груза') }}</h1>
                                <h2 class="flex justify-end font-pix items-center laptop:text-2xl minimal:text-xl text-coffee"> — </h2>
                            </div>
                            <div id="dashboard" class="grid grid-cols-2 items-center bg-oldpaper p-4 mb-4">
                                <h1 class="font-big items-center laptop:text-2xl minimal:text-xl text-coffee"> {{ __('Вес груза') }}</h1>
                                <h2 class="flex justify-end font-pix items-center laptop:text-2xl minimal:text-xl text-coffee"> — </h2>
                            </div>
                        </div>
                        <div class="grid grid-cols-2 items-center">
                            <div id="dashboard" class="items-center bg-oldpaper p-4 mb-4 mr-4">
                                <h1 class="font-big items-center mb-2 laptop:text-2xl minimal:text-xl text-coffee"> {{ __('Адрес загрузки') }}</h1>
                                <h2 class="flex justify-end font-pix items-center laptop:text-2xl minimal:text-xl text-coffee"> — </h2>
                            </div>
                            <div id="dashboard" class="items-center bg-oldpaper p-4 mb-4">
                                <h1 class="font-big items-center mb-2 laptop:text-2xl minimal:text-xl text-coffee"> {{ __('Адрес разгрузки') }}</h1>
                                <h2 class="flex justify-end font-pix items-center laptop:text-2xl minimal:text-xl text-coffee"> — </h2>
                            </div>
                        </div>
                        <div class="grid grid-cols-2 items-center">
                            <div id="dashboard" class="items-center bg-oldpaper p-4 mb-4 mr-4">
                                <h1 class="font-big items-center mb-2 laptop:text-2xl minimal:text-xl text-coffee"> {{ __('Дата создания') }}</h1>
                                <h2 class="font-base items-center laptop:text-xl minimal:text-lg text-coffee">00.00.0000</h2>
                            </div>
                            <div id="dashboard" class="items-center bg-oldpaper p-4 mb-4">
                                <h1 class="font-big items-center mb-2 laptop:text-2xl minimal:text-xl text-coffee"> {{ __('Дата загрузки') }}</h1>
                                <h2 class="font-base items-center laptop:text-xl minimal:text-lg text-coffee">00.00.0000</h2>
                            </div>
                        </div>
                        <div class="grid grid-cols-2 items-center">
                            <div id="dashboard" class="items-center bg-oldpaper p-4 mb-4 mr-4">
                                <h1 class="font-big items-center mb-2 laptop:text-2xl minimal:text-xl text-coffee"> {{ __('Дата принятия') }}</h1>
                                <h2 class="font-base items-center laptop:text-xl minimal:text-lg text-coffee"> {{ __('не принято') }} </h2>
                            </div>
                            <div id="dashboard" class="items-center bg-oldpaper p-4 mb-4">
                                <h1 class="font-big items-center mb-2 laptop:text-2xl minimal:text-xl text-coffee"> {{ __('Подтверждение оплаты') }}</h1>
                                <h2 class="font-base items-center laptop:text-xl minimal:text-lg text-coffee"> {{ __('не подтверждено') }} </h2>
                            </div>
                        </div>
                        <div class="grid grid-cols-2 items-center">
                            <div id="dashboard" class="items-center bg-oldpaper p-4 mr-4">
                                <h1 class="font-big items-center mb-2 laptop:text-2xl minimal:text-xl text-coffee"> {{ __('Дата отправления') }}</h1>
                                <h2 class="font-base items-center laptop:text-xl minimal:text-lg text-coffee"> {{ __('не отправлено') }} </h2>
                            </div>
                            <div id="dashboard" class="items-center bg-oldpaper p-4">
                                <h1 class="font-big items-center mb-2 laptop:text-2xl minimal:text-xl text-coffee"> {{ __('Дата доставки') }}</h1>
                                <h2 class="font-base items-center laptop:text-xl minimal:text-lg text-coffee"> {{ __('не доставлено') }} </h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</x-app-layout>