<x-app-layout>
    <div class="laptop:pt-10 minimal:pt-4 tablet:pt-0">
        <div class="desktop:w-full max-w-full tablet:px-6 minimal:px-2">

            <!-- заголовок страницы и описание -->
            <div class="laptop:flex tablet:hidden minimal:hidden justify-between items-center mb-10 ms-0">
                <h1 class="font-big text-4xl text-coffee">
                    {{ __('Мои заказы') }}
                </h1>
                <a href="{{ route('orders') }}" class="text-milano hover:text-brownpaper items-center text-4xl font-big text-center">
                    <h3 id="login" class="text-milano hover:text-brownpaper items-center text-4xl font-big text-center">
                        {{ __('Новые заказы') }}
                    </h3>
                </a>
            </div>

            <div class="laptop:hidden tablet:flex minimal:flex minimal:flex-row justify-between minimal:mb-10 ms-0">
                <h1 class="font-big minimal:text-2xl tablet:text-4xl text-coffee">
                    {{ __('Мои заказы') }}
                </h1>
                <a href="{{ route('orders') }}" class="text-milano hover:text-brownpaper minimal:text-2xl tablet:text-4xl font-big">
                    {{ __('К заказам') }}
                </a>
            </div>

            <!-- поиск -->
            <div class="flex mx-auto mb-10 items-end px-0">
                <div class="flex w-full h-fit">
                    <form action="{{ route('inwork') }}" method="GET" class="w-full">
                        <div class="flex max-w-full max-h-fit">
                            <x-input type="text" name="search" placeholder="поиск по всем критериям" class="text-center w-full block tablet:px-4 minimal:px-2 focus:outline-none" autocomplete="off"></x-input>
                            <button id="searchbtn" type="submit" class="tablet:px-4 minimal:px-2 bg-brownpaper -ms-2 border-4 border-coffee">
                                <svg id="search" class="minimal:h-6 minimal:w-6 tablet:w-8 tablet:h-8" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="#442d25" viewBox="0 0 73.09 73.09">
                                    <path d="M36,45H9L0,36V9L9,0h27l9,9v27l-9,9Z" />
                                    <rect x="53.5" y="41.16" width="9" height="33.68" transform="translate(-24.02 58) rotate(-45)" />
                                </svg>
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- список заказов -->
            <div class="tablet:hidden minimal:hidden laptop:flex overflow-x-auto desktop:w-full max-w-full">
                <table class="desktop:w-full max-w-full min-w-screen text-lg text-coffee">
                    <thead class="bg-brownpaper text-coffee border-4 border-coffee text-2xl text-center font-pix uppercase">
                        <tr>
                            <th scope="col" class="px-3 py-4 font-pix bg-milano text-hipnymph font-thin border-r-4 border-r-coffee">
                                №
                            </th>
                            <th scope="col" class="px-2 py-4 font-thin bg-milano border-r-4 border-r-coffee">
                                <div class="flex justify-center items-center">
                                    <x-user class="h-7 w-7" />
                                </div>
                            </th>
                            <th scope="col" class="px-4 py-4 font-thin">
                                тип
                            </th>
                            <th scope="col" class="px-4 py-4 font-thin">
                                описание
                            </th>
                            <th scope="col" class="px-4 py-4 font-thin">
                                вес
                            </th>
                            <th scope="col" class="px-4 py-4 font-thin">
                                дата загрузки
                            </th>
                            <th scope="col" class="px-4 py-4 font-thin">
                                адрес загрузки
                            </th>
                            <th scope="col" class="px-4 py-4 font-thin">
                                адрес разгрузки
                            </th>
                            <th scope="col" class="px-4 py-4 font-thin">
                                машина
                            </th>
                            <th scope="col" class="px-4 py-4 font-thin">
                                цена
                            </th>
                            <th scope="col" class="px-4 py-4 font-thin">
                                статус
                            </th>
                            <th scope="col" class="px-2 py-4 font-pix bg-milano text-hipnymph font-thin border-l-4 border-l-coffee">
                                смена
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($orderData->isEmpty())
                        <tr class="bg-oldpaper hover:bg-brownpaper/30 font-base text-center py-6 border-x-4 border-x-coffee border-b-4 border-b-coffee">
                            <td class="px-2 bg-milano border-r-4 border-r-coffee text-hipnymph text-2xl font-pix font-thin"> — </td>
                            <td class="px-2 bg-milano border-r-4 border-r-coffee text-hipnymph text-2xl font-pix font-thin"> — </td>
                            <td class="px-2 text-2xl font-pix font-thin"> — </td>
                            <td class="px-2 text-2xl font-pix font-thin"> — </td>
                            <td class="px-2 text-2xl font-pix font-thin"> — </td>
                            <td class="px-2 text-2xl font-pix font-thin"> — </td>
                            <td class="px-2 text-2xl font-pix font-thin"> — </td>
                            <td class="px-2 text-2xl font-pix font-thin"> — </td>
                            <td class="px-2 text-2xl font-pix font-thin"> — </td>
                            <td class="px-2 text-2xl font-pix font-thin"> — </td>
                            <td class="px-2 text-2xl font-pix font-thin"> — </td>
                            <td class="px-2 border-l-4 border-l-coffee bg-milano text-hipnymph text-2xl font-pix font-thin"> — </td>
                        </tr>
                        @else
                        @foreach($orderData as $order)
                        <tr class="bg-oldpaper hover:bg-brownpaper/30 font-base text-center py-6 border-x-4 border-x-coffee border-b-4 border-b-coffee">
                            <td class="px-2 py-2 bg-milano border-r-4 border-r-coffee text-hipnymph hover:text-brownpaper text-2xl font-pix font-thin"><a href="{{ route('orders.show', $order->id) }}"> {{ $order->id }} </a></td>
                            <td class="px-2 bg-milano border-r-4 border-r-coffee text-hipnymph hover:text-brownpaper text-2xl font-pix font-thin"> <a href="{{ route('user.profile', $order->id_customer) }}">{{ $order->id_customer }}</a></td>
                            <td class="px-2">{{ $order->cargo_type }}</td>
                            <td class="px-2">{{ $order->cargo_describe }}</td>
                            <td class="px-2">{{ $order->weight }}</td>
                            <td class="px-2">{{ $order->ready_date }}</td>
                            <td class="px-2">{{ $order->load_place }}</td>
                            <td class="px-2">{{ $order->unload_place }}</td>
                            <td class="px-2">{{ $order->truck_type }}</td>
                            @if ($order->cost === null)
                            <td class="px-2">ожидает предложения</td>
                            @elseif ($order->status === 'deleted')
                            <td class="px-2 text-crimson">—</td>
                            @else
                            <td class="px-2">{{ $order->cost }} ₽</td>
                            @endif
                            <td class="px-2">
                                @if ($order->status === 'processing')
                                <span class="flex items-center justify-center">
                                    ожидание

                                </span>

                                @elseif ($order->status === 'accepted')
                                <span class="flex items-center justify-center">
                                    принят

                                </span>

                                @elseif ($order->status === 'agreed')
                                <span class="flex items-center justify-center">
                                    согласован

                                </span>

                                @elseif ($order->status === 'payable')
                                <span class="flex items-center justify-center">
                                    оплачен

                                </span>

                                @elseif ($order->status === 'departing')
                                <span class="flex items-center justify-center">
                                    отправлен

                                </span>

                                @elseif ($order->status === 'delivered')
                                <span class="flex items-center justify-center">
                                    доставлен

                                </span>
                                @endif
                            </td>
                            <td class="bg-milano border-l-4 border-l-coffee">
                                @if ($order->status === 'accepted')
                                <span class="flex items-center justify-center font-pix text-xl text-hipnymph">
                                    ожидает цены
                                </span>
                                @elseif ($order->status === 'agreed')
                                <form method="POST" action="{{ route('orders.payable', $order->id) }}">
                                    @csrf
                                    <span class="flex items-center justify-center">
                                        <button type="submit" class="inline-flex px-2 py-1 items-center font-big text-xl text-coffee tracking-widest hover:text-brownpaper bg-oldpaper">
                                            оплачен
                                        </button>
                                    </span>
                                </form>

                                @elseif ($order->status === 'payable')
                                <form method="POST" action="{{ route('orders.departing', $order->id) }}">
                                    @csrf
                                    <span class="flex items-center justify-center">
                                        <button type="submit" class="inline-flex px-2 py-1 items-center font-big text-xl text-coffee tracking-widest hover:text-brownpaper bg-oldpaper">
                                            отправлен
                                        </button>
                                    </span>
                                </form>
                                @elseif ($order->status === 'departing')
                                <form method="POST" action="{{ route('orders.delivered', $order->id) }}">
                                    @csrf
                                    <span class="flex items-center justify-center">
                                        <button type="submit" class="inline-flex px-2 py-1 items-center font-big text-xl text-coffee tracking-widest hover:text-brownpaper bg-oldpaper">
                                            доставлен
                                        </button>
                                    </span>
                                </form>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                </table>
            </div>

            <!-- карточки заказов -->
            <div class="laptop:hidden minimal:flex flex-col flex gap-y-4 w-full">
                @foreach($orderData as $data)
                <div id="cardorder" class="flex w-full flex-col justify-center items-center mb-4 border-4 border-coffee bg-oldpaper">
                    <div class="cardhead w-full items-center py-2 px-2">
                        <h1 class="text-coffee text-2xl font-pix">Заказ #{{ $data->id }}</h1>
                        <span class="flex justify-start">
                            @if ($data->status === 'processing')
                            <span class="flex items-center justify-center">
                                <x-status-processing class="h-7 w-7" />
                            </span>

                            @elseif ($data->status === 'accepted')
                            <span class="flex items-center justify-center">
                                <x-status-accepted class="h-7 w-7" />
                            </span>

                            @elseif ($data->status === 'payable')
                            <span class="flex items-center justify-center">
                                <x-status-payable class="h-7 w-7" />
                            </span>

                            @elseif ($data->status === 'departing')
                            <span class="flex items-center justify-center">
                                <x-status-departing class="h-7 w-7" />
                            </span>

                            @elseif ($data->status === 'delivered')
                            <span class="flex items-center justify-center">
                                <x-status-departing class="h-7 w-7" />
                            </span>
                            @endif
                        </span>
                        <button class="text-coffee text-lg font-pix font-thin focus:outline-none toggle-btn">
                            ▼
                        </button>
                    </div>
                    <div class="collapsed hidden w-full">
                        <div id="cardorderbg" class="bg-brownpaper/30 px-4 border-t-4 border-t-coffee">
                            <!-- Скрытые данные о заказе -->
                            <ul>
                                <li class="flex flex-col justify-between font-base text-start py-2">
                                    <h1 class="text-coffee font-thin font-big text-xl"> Заказчик </h1>
                                    <h2 class="text-coffee font-thin font-base text-start text-lg">
                                        {{ $data->surname }}
                                        {{ $data->name }}
                                        {{ $data->patronymic }}
                                    </h2>
                                </li>
                                <li class="flex flex-col justify-between font-base text-start py-2">
                                    <h1 class="text-coffee font-thin font-big text-xl"> Тип </h1>
                                    <h2 class="text-coffee font-thin font-base text-start text-lg"> {{ $data->cargo_type }} </h2>
                                </li>
                                <li class="flex flex-col justify-between font-base text-start py-2">
                                    <h1 class="text-coffee font-thin font-big text-xl"> Описание </h2>
                                        <h2 class="text-coffee font-thin font-base text-start text-xl"> {{ $data->cargo_describe }} </h2>
                                </li>
                                <li class="flex flex-col justify-between font-base text-start py-2">
                                    <h1 class="text-coffee font-thin font-big text-xl"> Вес </h1>
                                    <h2 class="text-coffee font-thin font-base text-start text-xl"> {{ $data->weight }} </h2>
                                </li>
                                <li class="flex flex-col justify-between font-base text-start py-2">
                                    <h1 class="text-coffee font-thin font-big text-xl"> Откуда </h1>
                                    <h2 class="text-coffee font-thin font-base text-start text-xl"> {{ $data->load_place }} </h2>
                                </li>
                                <li class="flex flex-col justify-between font-base text-start py-2">
                                    <h1 class="text-coffee font-thin font-big text-xl"> Куда </h1>
                                    <h2 class="text-coffee font-thin font-base text-start text-xl"> {{ $data->unload_place }} </h2>
                                </li>
                                <li class="flex flex-col justify-between font-base text-start py-2">
                                    <h1 class="text-coffee font-thin font-big text-xl"> Машина </h1>
                                    <h2 class="text-coffee font-thin font-base text-start text-xl"> {{ $data->truck_type }} </h2>
                                </li>
                                <li class="flex flex-col justify-between font-base text-start py-2">
                                    <h1 class="text-coffee font-thin font-big text-xl"> Готов </h1>
                                    <h2 class="text-coffee font-thin font-base text-start text-xl"> {{ $data->ready_date }} </h2>
                                </li>
                                <li class="flex flex-col justify-between font-base text-start py-2">
                                    <h1 class="text-coffee font-thin font-big text-xl"> Телефон </h1>
                                    <h2 class="text-coffee font-thin font-base text-start text-xl"> {{ $data->phone }} </h2>
                                </li>
                                <li class="flex flex-row justify-between font-base text-start py-2">
                                    <h1 class="text-coffee font-thin font-big text-xl"> Сменить </h1>
                                    @if ($order->status === 'accepted')
                                    <form method="POST" action="{{ route('orders.departing', $order->id) }}">
                                        @csrf
                                        <span class="flex items-center justify-center">
                                            <button type="submit" class="inline-flex px-2 py-1 items-center font-big text-4xl text-hipnymph tracking-widest hover:text-brownpaper bg-oldpaper">
                                                отправлено
                                            </button>
                                        </span>
                                    </form>

                                    @elseif ($order->status === 'departing')
                                    <form method="POST" action="{{ route('orders.delivered', $order->id) }}">
                                        @csrf
                                        <span class="flex items-center justify-center">
                                            <button type="submit" class="inline-flex px-2 py-1 items-center font-big text-4xl text-hipnymph tracking-widest hover:text-brownpaper bg-oldpaper">
                                                доставлено
                                            </button>
                                        </span>
                                    </form>
                                    @endif
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>