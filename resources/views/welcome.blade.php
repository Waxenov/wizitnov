<x-app-layout>
    <!-- welcome -->
    <div class="flex justify-center items-center mt-20">
        <div class="desktop:max-w-[69rem] laptop:max-w-[52rem] tablet:max-w-[44rem]">
            <div class="tablet:block hidden">
                <div class="flex flex-row justify-center items-center px-4">
                    <h1 class="flex justify-end items-center font-pix text-4xl text-coffee desktop:text-7xl laptop:text-6xl tablet:text-5xl">
                        {{ __('Молодой портал грузоперевозок') }}
                    </h1>
                    <div class="flex flex-col font-base desktop:text-4xl laptop:text-3xl tablet:text-2xl minimal:text-lg text-coffee">
                        <h2>{{ __('Сервис для перевозки малогабаритного груза') }}</h2>
                        <h2>{{ __('по Омску и области') }}</h2>
                    </div>
                </div>
                <div class="bg-milano mt-5 p-2">
                    <h1 class="font-pix text-oldpaper text-center laptop:text-4xl tablet:text-3xl desktop:tracking-[0.32rem]">
                        {{ __('собираем перевозчиков и заказчиков в одном месте') }}
                    </h1>
                </div>
            </div>
            <div class="minimal:flex tablet:hidden hidden flex-col items-end px-4">
                <div class="px-4">
                    <h1 class="font-pix text-coffee mobile:text-5xl minimal:text-4xl mobile:tracking-[0rem] minimal:tracking-[0.12rem]">
                        {{ __('Молодой портал грузоперевозок') }}
                    </h1>
                </div>
                <div class="flex flex-col font-base text-2xl text-coffee">
                    <h2 class="text-justify my-4 px-4">
                        {{ __('Сервис для перевозки малогабаритного груза по Омску и Омской области') }}
                    </h2>
                </div>
                <div class="bg-milano px-4">
                    <h1 class="font-pix text-oldpaper text-center text-2xl">
                        {{ __('собираем перевозчиков и заказчиков в одном месте') }}
                    </h1>
                </div>
            </div>
        </div>
    </div>

    <!-- advantages -->
    <div class="mx-auto max-w-7xl pt-40 laptop:pb-20 mobile:pb-10 minimal:pb-8">
        <div class="flex justify-center items-center mx-auto bg-milano py-2">
            <h1 class="tablet:block hidden font-pix text-oldpaper tablet:text-4xl minimal:text-2xl">{{ __('Технологии которые сохраняют время') }}</h1>
            <h1 class="tablet:hidden block text-center font-pix text-oldpaper minimal:text-2xl">{{ __('Технологии сохраняют время') }}</h1>
        </div>

        <div id="dashboardbg" class="mx-auto max-w-7xl bg-brownpaper/30 minimal:py-4">
            <dl class="grid tablet:grid-cols-2 laptop:gap-x-6 tablet:gap-x-6 minimal:gap-x-4 tablet:gap-y-6 minimal:gap-y-6 desktop:px-12 laptop:px-6 mobile:px-4 minimal:px-2">

                <!-- advantage 1 -->
                <div id="dashboard" class="tablet:p-4 minimal:p-2 bg-oldpaper">
                    <h1 class="laptop:text-2xl minimal:text-xl text-xl text-coffee font-big">
                        {{ __('Удобство использования') }}
                    </h1>
                    <h2 class="mt-2 tablet:text-xl minimal:text-base font-base text-coffee">{{ __('Простой и интуитивно
                        понятный интерфейс с приятным дизайном делает процесс перевозок намного удобнее') }}
                    </h2>
                </div>

                <!-- advantage 2 -->
                <div id="dashboard" class="tablet:p-4 minimal:p-2 bg-oldpaper">
                    <h1 class="laptop:text-2xl minimal:text-xl text-xl text-coffee font-big">
                        {{ __('Эффективное управление') }}
                    </h1>
                    <h2 class="mt-2 tablet:text-xl minimal:text-base font-base text-coffee">{{ __('Дает подробности о доставке
                        грузов для заказчиков и управление состоянием заказов для перевозчиков') }}
                    </h2>
                </div>

                <!-- advantage 3 -->
                <div id="dashboard" class="tablet:p-4 minimal:p-2 bg-oldpaper">
                    <h1 class="laptop:text-2xl minimal:text-xl text-xl text-coffee font-big">
                        {{ __('Улучшенное сотрудничество') }}
                    </h1>
                    <h2 class="mt-2 tablet:text-xl minimal:text-base font-base text-coffee">{{ __('Создает прозрачную и эффективную
                        связь между заказчиками и перевозчиками для оперативного выполнения заказов') }}
                    </h2>
                </div>

                <!-- advantage 4 -->
                <div id="dashboard" class="tablet:p-4 minimal:p-2 bg-oldpaper">
                    <h1 class="laptop:text-2xl minimal:text-xl text-xl text-coffee font-big">
                        {{ __('Оптимизация статистики') }}
                    </h1>
                    <h2 class="mt-2 tablet:text-xl minimal:text-base font-base text-coffee">{{ __('Выбор предложений от
                        различных пользователей на основе статистики и отзывов
                        для лучшего понимания возможностей') }}
                    </h2>
                </div>
            </dl>
        </div>
    </div>

    <!-- DESKTOP -->
    <div class="hidden laptop:flex max-w-7xl flex-col gap-4 mx-auto">
        <!-- FAQ -->
        <div class="laptop:pb-20 mobile:pb-10 minimal:pb-8">
            <div class="flex justify-center items-center mx-auto bg-milano py-2">
                <h1 class="font-pix text-oldpaper tablet:text-4xl minimal:text-2xl"> {{ __('Порядок оформления заказа') }} </h1>
            </div>

            <div id="dashboardbg" class="mx-auto max-w-7xl bg-brownpaper/30 mobile:p-4 minimal:p-2">

                <div id="dashboard" class="bg-oldpaper mobile:mb-4 minimal:mb-2">
                    <div class="cardheadfaq w-full mobile:p-4 minimal:p-2">
                        <h1 class="font-big laptop:text-2xl minimal:text-xl text-coffee"> {{ __('Создание заказа') }} </h1>
                        <button class="text-brownpaper laptop:text-2xl minimal:text-lg font-big font-thin focus:outline-none toggle-btn flex justify-end items-center">
                            ▼
                        </button>
                    </div>
                    <div id="cardtextfaq" class="collapsed hidden w-full mobile:px-4 mobile:pb-4 minimal:px-2 minimal:pb-2">
                        <h2 class="font-base laptop:text-xl minimal:text-base text-coffee">
                            {{ __('Сформировать заказ можно заполнив форму с данными:
                            выбрать тип груза, нужный кузов машины, дать небольшое описание груза, ввести вес в кг, выбрать желаемую дату загрузки,
                            указать адрес загрузки и адрес разгрузки. При формировании заказа, учитывайте,
                            что минимальная разница между датой создания заказа и датой загрузки должна составлять 3 дня, иначе заказ не будет принят.') }}
                        </h2>
                    </div>
                </div>

                <div id="dashboard" class="bg-oldpaper mobile:mb-4 minimal:mb-2">
                    <div class="cardheadfaq w-full mobile:p-4 minimal:p-2">
                        <h1 class="font-big laptop:text-2xl minimal:text-xl text-coffee"> {{ __('Порядок оплаты') }} </h1>
                        <button class="text-brownpaper laptop:text-2xl minimal:text-lg font-big font-thin focus:outline-none toggle-btn flex justify-end items-center">
                            ▼
                        </button>
                    </div>
                    <div id="cardtextfaq" class="collapsed hidden w-full mobile:px-4 mobile:pb-4 minimal:px-2 minimal:pb-2">
                        <h2 class="font-base laptop:text-xl minimal:text-base text-coffee">
                            {{ __('Перевозчик, заинтересованный в выполнении заказа, предлагает свою цену за услугу.
                            Заказчик, в свою очередь, может просмотреть предложенную цену и принять решение:
                            согласиться на предложенную стоимость или отказаться.
                            Если заказчик соглашается со стоимостью перевозки, он должен произвести полную оплату
                            указанной перевозчиком стоимости для завершения оформления заказа. Согласие с ценой означает заключение договора перевозки между
                            заказчиком и перевозчиком. Оплата производится по безналичному расчету, переводом на карту по номеру телефона перевозчика
                            в течении суток с момента согласования цены в российских рублях.
                            Только после получения полной оплаты перевозчик приступает к выполнению услуги.') }}
                        </h2>
                    </div>
                </div>

                <div id="dashboard" class="bg-oldpaper">
                    <div class="cardheadfaq w-full mobile:p-4 minimal:p-2">
                        <h1 class="font-big laptop:text-2xl minimal:text-xl text-coffee"> {{ __('Детали заказа') }} </h1>
                        <button class="text-brownpaper laptop:text-2xl minimal:text-lg font-big font-thin focus:outline-none toggle-btn flex justify-end items-center">
                            ▼
                        </button>
                    </div>
                    <div id="cardtextfaq" class="collapsed hidden w-full mobile:px-4 mobile:pb-4 minimal:px-2 minimal:pb-2">
                        <h2 class="font-base laptop:text-xl minimal:text-base text-coffee">
                            {{ __('Все детали заказа находятся на отдельной странице, вы можете попасть туда
                            нажав на соответствующий номер заказа в списке заказов (пример: №123).
                            Такие детали как: номер заказа, номер заказчика, номер перевозчика, предложенная перевозчиком цена,
                            статус, тип груза, вес груза, адрес загрузки, адрес разгрузки, дата создания,
                            дата загрузки, дата доставки. А так же функции для изменения статуса заказа.
                            Для удобства доступны ссылки на профиль заказчика и перевозчика.') }}
                        </h2>
                    </div>
                </div>
            </div>
        </div>

        <!-- FEEDBACK -->
        <div>
            <div class="pb-4">
                <div class="flex justify-center items-center mx-auto bg-milano py-2">
                    <h1 class="font-pix text-oldpaper tablet:text-4xl minimal:text-2xl"> {{ __('Отзывы проекта') }} </h1>
                </div>
                <div id="dashboardbg" class="tablet:block minimal:hidden grid grid-cols-3 items-center bg-brownpaper/30 mobile:p-4 minimal:p-2">
                    <div class="-my-4">
                        @foreach ($comments as $comment)
                        <div class="mx-auto tablet:max-w-7xl minimal:max-w-sm mobile:my-4 minimal:my-2">
                            <div id="dashboard" class="p-4 bg-oldpaper">
                                <h2 class="mb-3 font-base text-lg text-coffee"> {{ $comment->content }} </h2>
                                <h1 class="font-big text-xl text-coffee"> {{ $comment->name }} </h1>
                                @if(Auth::check())
                                    @if(Auth::user()->role == 'administrator' || Auth::user()->role == 'magister')
                                        <form action="{{ route('welcome.erase', $comment->id) }}" method="POST">
                                            <button type="submit" value="DELETE" class="inline-flex px-1 py-1 items-center font-pix text-xl text-hipnymph tracking-widest hover:text-brownpaper bg-milano">удалить</button>
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    @endif
                                @endif
                            </div>
                        </div>
                        @endforeach
                    </div>

                    <!-- пагинация -->
                    {{ $comments->links() }}
                </div>
                <div id="dashboardbg" class="tablet:hidden minimal:block grid grid-rows-3 gap-10 items-center bg-brownpaper/30">
                    @foreach ($comments as $comment)
                    <div class="mobile:p-4 minimal:p-2">
                        <div id="dashboard" class="mobile:p-4 minimal:p-2 bg-oldpaper">
                            <h2 class="mb-2 font-base text-base text-coffee"> {{ $comment->content }} </h2>
                            <h1 class="font-big text-lg text-coffee"> {{ $comment->name }} </h1>
                            @if(Auth::check())
                                @if(Auth::user()->role == 'administrator' || Auth::user()->role == 'magister')
                                    <form action="{{ route('welcome.erase', $comment->id) }}" method="POST">
                                        <button type="submit" value="DELETE" class="inline-flex px-1 py-1 items-center font-pix text-xl text-hipnymph tracking-widest hover:text-brownpaper bg-milano">удалить</button>
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                @endif
                            @endif
                        </div>
                    </div>
                    @endforeach

                    <!-- пагинация -->
                    {{ $comments->links() }}
                </div>
            </div>

            @if(Auth::check())
            <div class="laptop:pt-20 mobile:pt-10 minimal:pt-8">
                <!-- форма отзыва -->
                <livewire:feedback-component />
            </div>
            @endif
        </div>
    </div>

    <!-- MOBILE -->
    <div class="laptop:hidden flex max-w-7xl flex-col mx-auto">
        <!-- FAQ -->
        <div>
            <div class="flex justify-center items-center mx-auto bg-milano py-2">
                <h1 class="font-pix text-oldpaper tablet:text-4xl minimal:text-2xl"> {{ __('Порядок оформления заказа') }} </h1>
            </div>
            <div id="dashboardbg" class="mx-auto max-w-7xl bg-brownpaper/30 mobile:p-4 minimal:p-2">

                <div id="dashboard" class="bg-oldpaper mobile:mb-4 minimal:mb-2">
                    <div class="cardheadfaq w-full mobile:p-4 minimal:p-2">
                        <h1 class="font-big laptop:text-2xl minimal:text-xl text-coffee"> {{ __('Создание заказа') }} </h1>
                        <button class="text-brownpaper laptop:text-2xl minimal:text-lg font-big font-thin focus:outline-none toggle-btn flex justify-end items-center">
                            ▼
                        </button>
                    </div>
                    <div id="cardtextfaq" class="collapsed hidden w-full mobile:px-4 mobile:pb-4 minimal:px-2 minimal:pb-2">
                        <h2 class="font-base laptop:text-xl minimal:text-base text-coffee">
                            {{ __('Сформировать заказ можно просто заполнив форму с данными:
                            выбрать тип груза, нужный кузов машины, дать небольшое описание груза, ввести вес в кг, выбрать желаемую дату загрузки,
                            указать адрес загрузки и адрес разгрузки. При формировании заказа, учитывайте,
                            что минимальная разница между датой создания заказа и датой загрузки должна составлять 3 дня, иначе заказ не будет принят.') }}
                        </h2>
                    </div>
                </div>
                <div id="dashboard" class="bg-oldpaper mobile:mb-4 minimal:mb-2">
                    <div class="cardheadfaq w-full mobile:p-4 minimal:p-2">
                        <h1 class="font-big laptop:text-2xl minimal:text-xl text-coffee"> {{ __('Порядок оплаты') }} </h1>
                        <button class="text-brownpaper laptop:text-2xl minimal:text-lg font-big font-thin focus:outline-none toggle-btn flex justify-end items-center">
                            ▼
                        </button>
                    </div>
                    <div id="cardtextfaq" class="collapsed hidden w-full mobile:px-4 minimal:px-2 minimal:pb-2">
                        <h2 class="font-base laptop:text-xl minimal:text-base text-coffee">
                            {{ __('Перевозчик, заинтересованный в выполнении заказа, предлагает свою цену за услугу.
                            Заказчик, в свою очередь, может просмотреть предложенную цену и принять решение:
                            согласиться на предложенную стоимость или отказаться.
                            Если заказчик соглашается со стоимостью перевозки, он должен произвести полную оплату
                            указанной перевозчиком стоимости для завершения оформления заказа. Согласие с ценой означает заключение договора перевозки между
                            заказчиком и перевозчиком. Оплата производится по безналичному расчету, переводом на карту по номеру телефона перевозчика
                            в течении суток с момента согласования цены в российских рублях.
                            Только после получения полной оплаты перевозчик приступает к выполнению услуги.') }}
                        </h2>
                    </div>
                </div>

                <div id="dashboard" class="bg-oldpaper">
                    <div class="cardheadfaq w-full mobile:p-4 minimal:p-2">
                        <h1 class="font-big laptop:text-2xl minimal:text-xl text-coffee"> {{ __('Детали заказа') }} </h1>
                        <button class="text-brownpaper laptop:text-2xl minimal:text-lg font-big font-thin focus:outline-none toggle-btn flex justify-end items-center">
                            ▼
                        </button>
                    </div>
                    <div id="cardtextfaq" class="collapsed hidden w-full mobile:px-4 minimal:px-2 minimal:pb-2">
                        <h2 class="font-base laptop:text-xl minimal:text-base text-coffee">
                            {{ __('Все детали заказа находятся на отдельной странице, вы можете попасть туда
                            нажав на соответствующий номер заказа в списке заказов (пример: №123).
                            Такие детали как: номер заказа, номер заказчика, номер перевозчика, предложенная перевозчиком цена,
                            статус, тип груза, вес груза, адрес загрузки, адрес разгрузки, дата создания,
                            дата загрузки, дата доставки. А так же функции для изменения статуса заказа.
                            Для удобства доступны ссылки на профиль заказчика и перевозчика.') }}
                        </h2>
                    </div>
                </div>

            </div>
        </div>

        <!-- FEEDBACK -->
        <div class="py-8">
            <div class="mobile:py-5 minimal:pb-8">
                <h1 class="font-pix text-oldpaper tablet:text-4xl minimal:text-2xl text-xl text-center bg-milano tablet:ps-10 mobile:ps-4 minimal:ps-2 py-2"> {{ __('Отзывы проекта') }} </h1>

                <div id="dashboardbg" class="tablet:block minimal:hidden grid grid-cols-3 gap-10 items-center bg-brownpaper/30 p-4">
                    @foreach ($comments as $comment)
                    <div class="max-w-full">
                        <div id="dashboard" class="p-4 bg-oldpaper">
                            <h2 class="mb-3 font-base text-lg text-coffee"> {{ $comment->content }} </h2>
                            <h1 class="font-big text-xl text-coffee"> {{ $comment->name }} </h1>
                            @if(Auth::check())
                                @if(Auth::user()->role == 'administrator' || Auth::user()->role == 'magister')
                                    <form action="{{ route('welcome.erase', $comment->id) }}" method="POST">
                                        <button type="submit" value="DELETE" class="inline-flex px-1 py-1 items-center font-pix text-xl text-hipnymph tracking-widest hover:text-brownpaper bg-milano">удалить</button>
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                @endif
                            @endif
                        </div>
                    </div>
                    @endforeach

                    <!-- пагинация -->
                    {{ $comments->links() }}
                </div>

                <div id="dashboardbg" class="tablet:hidden minimal:block grid grid-rows-3 gap-10 items-center bg-brownpaper/30">
                    @foreach ($comments as $comment)
                    <div class="mobile:p-4 minimal:p-2">
                        <div id="dashboard" class="mobile:p-4 minimal:p-2 bg-oldpaper">
                            <h2 class="mb-2 font-base text-base text-coffee"> {{ $comment->content }} </h2>
                            <h1 class="font-big text-lg text-coffee"> {{ $comment->name }} </h1>
                            @if(Auth::check())
                                @if(Auth::user()->role == 'administrator' || Auth::user()->role == 'magister')
                                    <form action="{{ route('welcome.erase', $comment->id) }}" method="POST">
                                        <button type="submit" value="DELETE" class="inline-flex px-1 py-1 items-center font-pix text-xl text-hipnymph tracking-widest hover:text-brownpaper bg-milano">удалить</button>
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                @endif
                            @endif
                        </div>
                    </div>
                    @endforeach

                    <!-- пагинация -->
                    {{ $comments->links() }}
                </div>
            </div>

            @if(Auth::check())
            <div class="laptop:pt-20 mobile:pt-10 minimal:pt-8">
                <!-- форма отзыва -->
                <livewire:feedback-component />
            </div>
            @endif
        </div>
    </div>

</x-app-layout>