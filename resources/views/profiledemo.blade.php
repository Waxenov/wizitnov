<x-app-layout>
    <div class="max-w-3xl mx-auto pt-10 ">
        <section id="card">
            <div class="items-center bg-milano p-4">
                <h1 class="text-4xl font-pix tracking-tight text-center text-oldpaper">
                    {{ __('Пользователь #0') }}
                </h1>
            </div>

            <div id="dashboardbg" class="p-4 bg-brownpaper/50">
                <div class="text-start items-center">
                    <div class="items-center">
                        <div class="grid grid-cols-2 items-center">
                            <div id="dashboard" class="items-center bg-oldpaper mr-4 p-4">
                                <h1 class="font-big items-center mb-2 laptop:text-2xl minimal:text-xl text-coffee"> {{ __('ФИО') }}</h1>
                                <h2 class="font-base items-center laptop:text-xl minimal:text-lg text-coffee">{{ __('Фамилия Имя Отчество') }}</h2>
                            </div>
                            <div id="dashboard" class="items-center bg-oldpaper p-4">
                                <h1 class="font-big items-center mb-2 laptop:text-2xl minimal:text-xl text-coffee"> {{ __('Телефон') }}</h1>
                                <h2 class="font-base items-center laptop:text-xl minimal:text-lg text-coffee">{{ __('70000000000') }}</h2>
                            </div>
                        </div>
                    </div>
                </div>
        </section>
    </div>
    <div class="max-w-3xl mx-auto pt-10">
        <section id="card">
            <div class="grid grid-cols-2 items-center bg-milano p-4">
                <h1 class="text-4xl font-pix tracking-tight text-start text-oldpaper">
                    {{ __('Детали') }}
                </h1>
            </div>
            <div id="dashboardbg" class="p-4 bg-brownpaper/50">
                <div class="text-start items-center">
                    <div class="items-center">
                        <div class="grid grid-cols-2 items-center">
                            <div id="dashboard" class="items-center bg-oldpaper mr-4 p-4">
                                <h1 class="font-big items-center mb-2 laptop:text-2xl minimal:text-xl text-coffee"> {{ __('Заказы') }}</h1>
                                <h2 class="font-base items-center laptop:text-xl minimal:text-lg text-coffee">{{ __('999') }}</h2>
                            </div>
                            <div id="dashboard" class="items-center bg-oldpaper p-4">
                                <h1 class="font-big items-center mb-2 laptop:text-2xl minimal:text-xl text-coffee"> {{ __('Рейтинг') }}</h1>
                                <h2 class="font-base items-center laptop:text-xl minimal:text-lg text-coffee">{{ __('5.0') }}</h2>
                            </div>
                        </div>
                    </div>
                </div>
        </section>
    </div>
    <div class="max-w-3xl mx-auto pt-10">
        <section id="card">
            <div class="grid grid-cols-2 items-center bg-milano p-4">
                <h1 class="text-4xl font-pix tracking-tight text-start text-oldpaper">
                    {{ __('Отзывы') }}
                </h1>
            </div>
            <div id="dashboardbg" class="p-4 bg-brownpaper/50">
                <div class="text-start items-center">
                    <div class="items-center">
                        <div class="grid grid-cols-1 items-center">
                            <div id="dashboard" class="items-center bg-oldpaper p-4">
                                <h1 class="font-big items-center laptop:text-2xl minimal:text-xl text-coffee"> {{ __('Пользователь') }}</h1>
                                <h2 class="font-base items-center laptop:text-xl minimal:text-lg text-coffee">{{ __('Содержание') }}</h2>
                                <h3 class="font-pix items-center mb-2 text-xl minimal:text-lg text-milano"> {{ __('★★★★★') }}</h3>
                                <h2 class="font-base items-center text-xl minimal:text-lg text-milano">{{ __('00.00.0000 00:00') }}</h2>
                            </div>
                        </div>
                    </div>
                </div>
        </section>
    </div>
</x-app-layout>