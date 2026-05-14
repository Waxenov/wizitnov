<x-app-layout>
    <div class="max-w-5xl mx-auto pt-10 ">
        <section id="card">
            <div class="grid grid-cols-2 items-center bg-milano p-4">
                <h1 class="tablet:text-4xl minimal:text-2xl font-pix tracking-tight text-start text-oldpaper">
                    Заказ
                    <a href="{{ route('orders.show', $order->id) }}" class="hover:bg-crimson hover:underline px-2">#{{ $order->id }}</a>
                </h1>
                <h1 class="tablet:text-4xl minimal:text-2xl font-pix tracking-tight text-end text-oldpaper">
                    Заказчик
                    <a href="{{ route('user.profile', $order->id_customer) }}" class="hover:bg-crimson hover:underline px-2">#{{ $order->id_customer }}</a>
                </h1>
            </div>
            <div id="dashboardbg" class="p-4 bg-brownpaper/30">
                @if(Auth::user()->status == 'active')
                    <div class="text-start items-center">
                        <div class="items-center">
                            <!--для заказчика -->
                            <div class="grid grid-cols-2 items-center">
                                <div id="dashboard" class="grid grid-cols-2 items-center bg-oldpaper p-4 mb-4 mr-4">
                                    <h1 class="font-big items-center laptop:text-2xl minimal:text-xl text-coffee"> {{ __('Цена услуги') }}</h1>
                                    @if ($order->cost != null)
                                        <h2 class="flex justify-end font-base items-center laptop:text-xl minimal:text-lg text-coffee">{{ $order->cost }} ₽</h2>
                                    @else
                                        <h2 class="flex justify-end font-base items-center laptop:text-xl minimal:text-lg text-coffee"> нет </h2>
                                    @endif
                                </div>
                                @if ($order->cost != null && Auth::user()->id === $order->id_customer && $order->status === 'accepted')
                                    <div id="dashboard" class="grid grid-cols-1 items-center bg-oldpaper p-4 mb-4">
                                        <form action="{{ route('orders.agreedOffer', $order->id) }}" method="POST">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="inline-flex justify-start px-2 items-center font-big laptop:text-2xl minimal:text-xl text-milano tracking-widest hover:text-brownpaper">Согласиться</button>
                                        </form>
                                    </div>
                                @elseif ($order->cost === null && $order->status === 'processing')
                                    <div id="dashboard" class="grid grid-cols-1 items-center bg-oldpaper p-4 mb-4">
                                        <h3 class="font-big items-center laptop:text-2xl minimal:text-xl text-milano"> {{ __('Ожидает принятия') }}</h3>
                                    </div>
                                @elseif ($order->cost === null)
                                    <div id="dashboard" class="grid grid-cols-1 items-center bg-oldpaper p-4 mb-4">
                                        <h3 class="font-big items-center laptop:text-2xl minimal:text-xl text-milano"> {{ __('Ожидает предложения цены') }}</h3>
                                    </div>
                                @elseif ($order->cost != null && $order->status === 'accepted')
                                    <div id="dashboard" class="grid grid-cols-1 items-center bg-oldpaper p-4 mb-4">
                                        <h3 class="font-big items-center laptop:text-2xl minimal:text-xl text-milano"> {{ __('Ожидает согласия заказчика') }}</h3>
                                    </div>
                                @elseif ($order->status === 'agreed')
                                    <div id="dashboard" class="grid grid-cols-1 items-center bg-oldpaper p-4 mb-4">
                                        <h3 class="font-big items-center laptop:text-2xl minimal:text-xl text-milano"> {{ __('Ожидает оплаты') }}</h3>
                                    </div>
                                @elseif ($order->status === 'payable')
                                    <div id="dashboard" class="grid grid-cols-1 items-center bg-oldpaper p-4 mb-4">
                                        <h3 class="font-big items-center laptop:text-2xl minimal:text-xl text-milano"> {{ __('Приступил к выполнению') }}</h3>
                                    </div>
                                @elseif ($order->status === 'departing')
                                    <div id="dashboard" class="grid grid-cols-1 items-center bg-oldpaper p-4 mb-4">
                                        <h3 class="font-big items-center laptop:text-2xl minimal:text-xl text-milano"> {{ __('Выполняется') }}</h3>
                                    </div>
                                @elseif ($order->status === 'delivered')
                                    <div id="dashboard" class="grid grid-cols-1 items-center bg-oldpaper p-4 mb-4">
                                        <h3 class="font-big items-center laptop:text-2xl minimal:text-xl text-milano"> {{ __('Успешно выполнен') }}</h3>
                                    </div>
                                @elseif ($order->status === 'deleted')
                                    <div id="dashboard" class="grid grid-cols-1 items-center bg-oldpaper p-4 mb-4">
                                        <h3 class="font-big items-center laptop:text-2xl minimal:text-xl text-milano"> {{ __(' — ') }}</h3>
                                    </div>
                                @endif
                            </div>

                            @if (Auth::user()->hasRole('transporter'))
                                @if ($order->status === 'accepted')
                                    <!--для перевозчика -->
                                    <div class="grid grid-cols-2 items-center bg-oldpaper mb-4">
                                        <div id="dashboard" class="grid grid-cols-1 items-center bg-oldpaper p-4">
                                            <h1 class="font-big items-center laptop:text-2xl minimal:text-xl text-coffee"> {{ __('Ваша цена') }}</h1>
                                        </div>
                                        <form action="{{ route('orders.createOffer', $order->id) }}" method="POST" class="grid grid-cols-2">
                                            @csrf
                                            <div id="dashboard" class="flex justify-start items-center bg-oldpaper">
                                                <x-input type="number" step="10" min="0" name="cost" class="text-center w-full block tablet:px-4 minimal:px-2 focus:outline-none" autocomplete="off"></x-input>
                                            </div>
                                            <div id="dashboard" class="flex justify-end items-center bg-oldpaper p-4">
                                                <button type="submit" class="inline-flex justify-end px-2 items-center font-big laptop:text-2xl minimal:text-xl text-milano tracking-widest hover:text-brownpaper">Предложить</button>
                                            </div>
                                        </form>
                                    </div>
                                @endif
                            @endif

                            <div class="grid grid-cols-2 items-center">
                                <div id="dashboard" class="grid grid-cols-2 items-center bg-oldpaper gap-2 p-4 mb-4 mr-4">
                                    <h1 class="tablet:block minimal:hidden font-big items-center laptop:text-2xl minimal:text-xl text-coffee"> {{ __('Перевозчик') }}</h1>
                                    <div class="tablet:hidden minimal:flex justify-start items-center">
                                        <x-truck class="h-10 w-10" />
                                    </div>
                                    @if ($order->id_transporter != null)
                                        <h2 class="flex justify-end font-base items-center laptop:text-xl minimal:text-lg text-coffee"><a href="{{ route('user.profile', $order->id_transporter) }}">#{{ $order->id_transporter }}</a></h2>
                                    @else
                                        <h2 class="flex justify-end font-base items-center laptop:text-xl minimal:text-lg text-coffee"> {{ __('нет') }} </h2>
                                    @endif
                                </div>
                                <div id="dashboard" class="grid grid-cols-2 items-center bg-oldpaper p-4 mb-4">
                                    <h1 class="font-big items-center laptop:text-2xl minimal:text-xl text-coffee"> {{ __('Статус') }}</h1>
                                    <div class="flex justify-end items-center">
                                        @if ($order->status === 'processing')
                                            <span class="flex flex-row gap-x-2 items-center justify-center">
                                                <h3 class="tablet:block minimal:hidden font-pix items-center text-3xl text-milano">{{ __('ожидание') }}</h3>
                                                <x-status-processing class="h-7 w-7" />
                                            </span>
                                        @elseif ($order->status === 'accepted')
                                            <span class="flex flex-row gap-2 items-center justify-center">
                                                <h3 class="tablet:block minimal:hidden font-pix items-center text-3xl text-milano">{{ __('принят') }}</h3>
                                                <x-status-accepted class="h-7 w-7" />
                                            </span>
                                        @elseif ($order->status === 'agreed')
                                            <span class="flex flex-row gap-2 items-center justify-center">
                                                <h3 class="tablet:block minimal:hidden font-pix items-center text-3xl text-milano">{{ __('согласован') }}</h3>
                                                <x-status-agreed class="h-7 w-7" />
                                            </span>
                                        @elseif ($order->status === 'payable')
                                            <span class="flex flex-row gap-2 items-center justify-center">
                                                <h3 class="tablet:block minimal:hidden font-pix items-center text-3xl text-milano">{{ __('оплачен') }}</h3>
                                                <x-status-payable class="h-7 w-7" />
                                            </span>
                                        @elseif ($order->status === 'departing')
                                            <span class="flex flex-row gap-2 items-center justify-center">
                                                <h3 class="tablet:block minimal:hidden font-pix items-center text-3xl text-milano">{{ __('отправлен') }}</h3>
                                                <x-status-departing class="h-7 w-7" />
                                            </span>
                                        @elseif ($order->status === 'delivered')
                                            <span class="flex flex-row gap-2 items-center justify-center">
                                                <h3 class="tablet:block minimal:hidden font-pix items-center text-3xl text-milano">{{ __('доставлен') }}</h3>
                                                <x-status-departing class="h-7 w-7" />
                                            </span>
                                        @elseif ($order->status === 'deleted')
                                            <span class="flex flex-row gap-2 items-center justify-center">
                                                <h3 class="tablet:block minimal:hidden font-pix items-center text-3xl text-milano">{{ __('удалён') }}</h3>
                                                <x-status-deleted class="h-7 w-7" />
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="grid grid-cols-2 items-center">
                                <div id="dashboard" class="grid grid-cols-2 items-center bg-oldpaper p-4 mb-4 mr-4">
                                    <h1 class="font-big items-center laptop:text-2xl minimal:text-xl text-coffee"> {{ __('Тип груза') }}</h1>
                                    <h2 class="flex justify-end font-base items-center laptop:text-xl minimal:text-lg text-coffee">{{ $order->cargo_type }}</h2>
                                </div>
                                <div id="dashboard" class="grid grid-cols-2 items-center bg-oldpaper p-4 mb-4">
                                    <h1 class="font-big items-center laptop:text-2xl minimal:text-xl text-coffee"> {{ __('Вес груза') }}</h1>
                                    <h2 class="flex justify-end font-base items-center laptop:text-xl minimal:text-lg text-coffee">{{ $order->weight }} кг</h2>
                                </div>
                            </div>
                            <div class="grid grid-cols-2 items-center">
                                <div id="dashboard" class="items-center bg-oldpaper p-4 mb-4 mr-4">
                                    <h1 class="font-big items-center mb-2 laptop:text-2xl minimal:text-xl text-coffee"> {{ __('Адрес загрузки') }}</h1>
                                    <h2 class="font-base items-center laptop:text-xl minimal:text-lg text-coffee">{{ $order->load_place }}</h2>
                                </div>
                                <div id="dashboard" class="items-center bg-oldpaper p-4 mb-4">
                                    <h1 class="font-big items-center mb-2 laptop:text-2xl minimal:text-xl text-coffee"> {{ __('Адрес разгрузки') }}</h1>
                                    <h2 class="font-base items-center laptop:text-xl minimal:text-lg text-coffee">{{ $order->unload_place }}</h2>
                                </div>
                            </div>
                            <div class="grid grid-cols-2 items-center">
                                <div id="dashboard" class="items-center bg-oldpaper p-4 mb-4 mr-4">
                                    <h1 class="font-big items-center mb-2 laptop:text-2xl minimal:text-xl text-coffee"> {{ __('Дата создания') }}</h1>
                                    <h2 class="font-base items-center laptop:text-xl minimal:text-lg text-coffee">{{ $order->created_at }}</h2>
                                </div>
                                <div id="dashboard" class="items-center bg-oldpaper p-4 mb-4">
                                    <h1 class="font-big items-center mb-2 laptop:text-2xl minimal:text-xl text-coffee"> {{ __('Дата загрузки') }}</h1>
                                    <h2 class="font-base items-center laptop:text-xl minimal:text-lg text-coffee">{{ $order->ready_date }}</h2>
                                </div>
                            </div>
                            <div class="grid grid-cols-2 items-center">
                                <div id="dashboard" class="items-center bg-oldpaper p-4 mb-4 mr-4">
                                    <h1 class="font-big items-center mb-2 laptop:text-2xl minimal:text-xl text-coffee"> {{ __('Дата принятия') }}</h1>
                                    @if ($order->accepted_at != null)
                                        <h2 class="font-base items-center laptop:text-xl minimal:text-lg text-coffee">{{ $order->accepted_at }}</h2>
                                    @else
                                        <h2 class="font-base items-center laptop:text-xl minimal:text-lg text-coffee"> {{ __('не принят') }} </h2>
                                    @endif
                                </div>
                                <div id="dashboard" class="items-center bg-oldpaper p-4 mb-4">
                                    <h1 class="font-big items-center mb-2 laptop:text-2xl minimal:text-xl text-coffee"> {{ __('Подтверждение оплаты') }}</h1>
                                    @if ($order->payable_at != null)
                                        <h2 class="font-base items-center laptop:text-xl minimal:text-lg text-coffee">{{ $order->payable_at }}</h2>
                                    @else
                                        <h2 class="font-base items-center laptop:text-xl minimal:text-lg text-coffee"> {{ __('нет') }} </h2>
                                    @endif
                                </div>
                            </div>
                            <div class="grid grid-cols-2 items-center">
                                <div id="dashboard" class="items-center bg-oldpaper p-4 mr-4">
                                    <h1 class="font-big items-center mb-2 laptop:text-2xl minimal:text-xl text-coffee"> {{ __('Дата отправления') }}</h1>
                                    @if ($order->departing_at != null)
                                        <h2 class="font-base items-center laptop:text-xl minimal:text-lg text-coffee">{{ $order->departing_at }}</h2>
                                    @else
                                        <h2 class="font-base items-center laptop:text-xl minimal:text-lg text-coffee"> {{ __('не отправлен') }} </h2>
                                    @endif
                                </div>
                                <div id="dashboard" class="items-center bg-oldpaper p-4">
                                    <h1 class="font-big items-center mb-2 laptop:text-2xl minimal:text-xl text-coffee"> {{ __('Дата доставки') }}</h1>
                                    @if ($order->delivered_at != null)
                                        <h2 class="font-base items-center laptop:text-xl minimal:text-lg text-coffee">{{ $order->delivered_at }}</h2>
                                    @else
                                        <h2 class="font-base items-center laptop:text-xl minimal:text-lg text-coffee"> {{ __('не доставлен') }} </h2>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @elseif(Auth::user()->status == 'process')
                    <div class="w-full flex justify-center items-center py-4">
                        <h1 class="text-coffee text-2xl font-pix font-thin text-center">
                            {{ __('Ваш аккаунт не активирован') }}
                        </h1>
                    </div>
                @elseif(Auth::user()->status == 'block')
                    <div class="w-full flex justify-center items-center py-4">
                        <h1 class="text-coffee text-2xl font-pix font-thin text-center">
                            {{ __('Ваш аккаунт заблокирован') }}
                        </h1>
                    </div>
                @endif
            </div>
        </section>
    </div>
</x-app-layout>