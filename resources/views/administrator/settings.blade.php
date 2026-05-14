@if(Auth::user()->role == 'administrator' || Auth::user()->role == 'magister')
<x-app-layout>
    <div class="laptop:pt-10 tablet:pt-0">
        <div class="desktop:w-full max-w-full tablet:px-6 minimal:px-2">

            <!-- заголовок для ноутбуков -->
            <div class="laptop:flex tablet:hidden minimal:hidden items-center mb-10 ms-0">
                <h1 class="font-big text-4xl text-coffee">
                    {{ __('Пользователи') }}
                </h1>
            </div>

            <!-- заголовок для мобильных устройств -->
            <div class="laptop:hidden tablet:flex minimal:flex minimal:flex-row minimal:mb-10 minimal:mt-4 ms-0">
                <h1 class="font-big minimal:text-2xl tablet:text-4xl text-coffee">
                    {{ __('Пользователи') }}
                </h1>
            </div>

            <!-- поиск -->
            <div class="flex mx-auto mb-10 items-end px-0">
                <div class="flex w-full h-fit">
                    <form action="{{ route('settings') }}" method="GET" class="w-full">
                        <div class="flex max-w-full max-h-fit">
                            <x-input type="text" name="search" placeholder="поиск по всем критериям" class="text-center w-full block tablet:px-4 minimal:px-2 focus:outline-none" autocomplete="off"></x-input>
                            <button id="searchbtn" type="submit" class="tablet:px-4 minimal:px-2 bg-oldpaper -ms-2 border-4 border-coffee">
                                <svg id="search" class="minimal:h-6 minimal:w-6 tablet:w-8 tablet:h-8" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="#442d25" viewBox="0 0 73.09 73.09">
                                    <path d="M36,45H9L0,36V9L9,0h27l9,9v27l-9,9Z" />
                                    <rect x="53.5" y="41.16" width="9" height="33.68" transform="translate(-24.02 58) rotate(-45)" />
                                </svg>
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="flex flex-col overflow-x-auto desktop:w-full max-w-full">
                <table class="desktop:w-full max-w-full min-w-screen text-lg text-coffee">
                    <thead class="bg-brownpaper text-coffee border-4 border-coffee text-2xl text-center font-pix uppercase">
                        <tr>
                            <th scope="col" class="px-4 py-4 font-pix bg-milano text-hipnymph font-thin border-r-4 border-r-coffee">
                                №
                            </th>
                            <th scope="col" class="px-4 py-4 font-thin">
                                роль
                            </th>
                            <th scope="col" class="px-4 py-4 font-thin">
                                доступ
                            </th>
                            <th scope="col" class="px-4 py-4 font-thin">
                                почта
                            </th>
                            <th scope="col" class="px-4 py-4 font-thin">
                                телефон
                            </th>
                            <th scope="col" class="px-4 py-4 font-thin">
                                фамилия
                            </th>
                            <th scope="col" class="px-4 py-4 font-thin">
                                имя
                            </th>
                            <th scope="col" class="px-4 py-4 font-thin">
                                отчество
                            </th>
                            <th scope="col" class="px-4 py-4 font-thin">
                                заказы
                            </th>
                            <th scope="col" class="items-center px-2 py-4 font-pix bg-milano font-thin border-l-4 border-l-coffee">
                                <div class="flex justify-center items-center">
                                    <x-trash class="h-7 w-7" />
                                </div>
                            </th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($users as $user)
                            <tr class="bg-oldpaper hover:bg-brownpaper/30 font-base text-center py-6 border-x-4 border-x-coffee border-b-4 border-b-coffee">
                                <td class="px-2 bg-milano border-r-4 border-r-coffee text-hipnymph hover:text-brownpaper text-2xl font-pix font-thin">
                                    <a href="{{ route('user.profile', $user->id) }}" class="hover:text-brownpaper">{{ $user->id }}</a>
                                </td>
                                <td class="text-2xl font-pix font-thin">
                                    @if ($user->role === 'magister')
                                        @if(Auth::user()->role === 'magister')
                                        <form action="{{ route('settings.updateRole', $user->id) }}" method="POST" class="flex justify-center items-center mx-auto">
                                            <!-- смена доступа пользователя -->
                                            <select name="role" class="text-coffee border-4 border-milano text-xl focus:ring-milano focus:border-milano">
                                                <option value="magister" {{ $user->role === 'magister' ? 'selected' : '' }}>Владелец</option>
                                                <option value="administrator" {{ $user->role === 'administrator' ? 'selected' : '' }}>Администратор</option>
                                                <option value="transporter" {{ $user->role === 'transporter' ? 'selected' : '' }}>Перевозчик</option>
                                                <option value="customer" {{ $user->role === 'customer' ? 'selected' : '' }}>Заказчик</option>
                                            </select>
                                            <div class="pl-2 py-2">
                                                @csrf
                                                @method('PUT')
                                                <x-button type="submit" class="inline-flex border-0 items-center">›</x-button>
                                            </div>
                                        </form>

                                        @endif
                                    @elseif($user->role === 'administrator')
                                        @if(Auth::user()->role === 'magister')
                                            <form action="{{ route('settings.updateRole', $user->id) }}" method="POST" class="flex justify-center items-center mx-auto">
                                                <!-- смена доступа пользователя -->
                                                <select name="role" class="text-coffee border-4 border-milano text-xl focus:ring-milano focus:border-milano">
                                                    <option value="magister" {{ $user->role === 'magister' ? 'selected' : '' }}>Владелец</option>
                                                    <option value="administrator" {{ $user->role === 'administrator' ? 'selected' : '' }}>Администратор</option>
                                                    <option value="transporter" {{ $user->role === 'transporter' ? 'selected' : '' }}>Перевозчик</option>
                                                    <option value="customer" {{ $user->role === 'customer' ? 'selected' : '' }}>Заказчик</option>
                                                </select>
                                                    @if (session('success'))
                                                        <div class="alert alert-success">
                                                            {{ session('success') }}
                                                        </div>
                                                    @endif
                                                <div class="pl-2 py-2">
                                                    @csrf
                                                    @method('PUT')
                                                    <x-button type="submit" class="inline-flex border-0 items-center">›</x-button>
                                                </div>
                                            </form>
                                        @else
                                            <h1> Администратор </h1>
                                        @endif
                                    @else
                                        <form action="{{ route('settings.updateRole', $user->id) }}" method="POST" class="flex justify-center items-center mx-auto">
                                            <!-- смена доступа пользователя -->
                                            <select name="role" class="text-coffee border-4 border-milano text-xl focus:ring-milano focus:border-milano">
                                                <option value="administrator" {{ $user->role === 'administrator' ? 'selected' : '' }}>Администратор</option>
                                                <option value="transporter" {{ $user->role === 'transporter' ? 'selected' : '' }}>Перевозчик</option>
                                                <option value="customer" {{ $user->role === 'customer' ? 'selected' : '' }}>Заказчик</option>
                                            </select>
                                                @if (session('success'))
                                                    <div class="alert alert-success">
                                                        {{ session('success') }}
                                                    </div>
                                                @endif
                                            <div class="pl-2 py-2">
                                                @csrf
                                                @method('PUT')
                                                <x-button type="submit" class="inline-flex border-0 items-center">›</x-button>
                                            </div>
                                        </form>
                                    @endif
                                </td>
                                <td class="text-2xl font-pix font-thin">
                                    @if ($user->role === 'magister')
                                        <h1> Абсолютный </h1>
                                    @elseif($user->role === 'administrator')
                                        @if(Auth::user()->role === 'magister')
                                            @if ($user->status === 'process')
                                                <form action="{{ route('settings.updateStatus', $user->id) }}" method="POST" class="flex justify-center items-center mx-auto">
                                                    @csrf
                                                    @method('PUT')
                                                    <input type="hidden" name="status" value="active">
                                                    <x-button type="submit">Активация</x-button>
                                                </form>
                                            @elseif($user->status === 'active')
                                                <form action="{{ route('settings.updateStatus', $user->id) }}" method="POST" class="flex justify-center items-center mx-auto">
                                                    @csrf
                                                    @method('PUT')
                                                    <input type="hidden" name="status" value="block">
                                                    <x-button type="submit">Блокировка</x-button>
                                                </form>
                                            @elseif($user->status === 'block')
                                                <form action="{{ route('settings.updateStatus', $user->id) }}" method="POST" class="flex justify-center items-center mx-auto">
                                                    @csrf
                                                    @method('PUT')
                                                    <input type="hidden" name="status" value="active">
                                                    <x-button type="submit">Активация</x-button>
                                                </form>
                                            @endif
                                        @else
                                            @if ($user->status === 'process')
                                                <h1> Ожидание </h1>
                                            @elseif($user->status === 'active')
                                                <h1> Активен </h1>
                                            @elseif($user->status === 'block')
                                                <h1> Блокирован </h1>
                                            @endif
                                        @endif
                                    @else
                                        @if ($user->status === 'process')
                                            <form action="{{ route('settings.updateStatus', $user->id) }}" method="POST" class="flex justify-center items-center mx-auto">
                                                @csrf
                                                @method('PUT')
                                                <input type="hidden" name="status" value="active">
                                                <x-button type="submit">Разрешить</x-button>
                                            </form>
                                        @elseif($user->status === 'active')
                                            <form action="{{ route('settings.updateStatus', $user->id) }}" method="POST" class="flex justify-center items-center mx-auto">
                                                @csrf
                                                @method('PUT')
                                                <input type="hidden" name="status" value="block">
                                                <x-button type="submit">Блокировка</x-button>
                                            </form>
                                        @elseif($user->status === 'block')
                                            <form action="{{ route('settings.updateStatus', $user->id) }}" method="POST" class="flex justify-center items-center mx-auto">
                                                @csrf
                                                @method('PUT')
                                                <input type="hidden" name="status" value="active">
                                                <x-button type="submit">Активация</x-button>
                                            </form>
                                        @endif
                                    @endif
                                </td>
                                <td class="px-2 text-2xl font-pix font-thin">{{ $user->login }}</td>
                                <td class="px-2 text-2xl font-pix font-thin">{{ $user->phone }}</td>
                                <td class="px-2 text-2xl font-pix font-thin">{{ $user->surname }}</td>
                                <td class="px-2 text-2xl font-pix font-thin">{{ $user->name }}</td>
                                <td class="px-2 text-2xl font-pix font-thin">{{ $user->patronymic }}</td>
                                @if ($user->role === 'customer')
                                    @foreach ($customers as $customer)
                                        @if ($customer->login === $user->login)
                                            <td class="px-2 text-2xl font-pix font-thin">{{ $customer->orders_count }}</td>
                                        @endif
                                    @endforeach
                                @elseif ($user->role === 'transporter')
                                    @foreach ($transporters as $transporter)
                                        @if ($transporter->login === $user->login)
                                            <td class="px-2 text-2xl font-pix font-thin">{{ $transporter->orders_count }}</td>
                                        @endif
                                    @endforeach
                                @elseif ($user->role === 'administrator')
                                    <td class="px-2 text-2xl font-pix font-thin"> — </td>
                                @elseif ($user->role === 'magister')
                                    <td class="px-2 text-2xl font-pix font-thin"> — </td>
                                @endif

                                @if($user->role === 'administrator' || $user->role === 'magister')
                                    @if(Auth::user()->role === 'magister')
                                        <td class="bg-milano border-l-4 border-l-coffee">
                                            <form action="{{ route('settings.remove', $user->id) }}" method="POST">
                                                <button type="submit" value="DELETE" class="inline-flex px-2 py-1 items-center font-big text-4xl text-hipnymph tracking-widest hover:text-brownpaper bg-milano">×</button>
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </td>
                                    @else
                                        <td class="bg-milano border-l-4 border-l-coffee text-hipnymph font-pix text-2xl"> — </td>
                                    @endif
                                @else
                                    <td class="bg-milano border-l-4 border-l-coffee">
                                        <form action="{{ route('settings.remove', $user->id) }}" method="POST">
                                            <button type="submit" value="DELETE" class="inline-flex px-2 py-1 items-center font-big text-4xl text-hipnymph tracking-widest hover:text-brownpaper bg-milano">×</button>
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </td>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="flex flex-col justify-between items-start py-12 ms-0">
                <h1 class="font-big text-4xl text-coffee leading-tight">
                    {{ __('Отзывы') }}
                </h1>
            </div>

            <div class="flex flex-col overflow-x-auto desktop:w-full max-w-full">
                <table class="desktop:w-full max-w-full min-w-screen text-lg text-coffee">
                    <thead class="bg-brownpaper text-coffee border-4 border-coffee text-2xl text-center font-pix uppercase">
                        <tr>
                            <th scope="col" class="px-4 py-4 font-pix bg-milano text-hipnymph font-thin border-r-4 border-r-coffee">
                                №
                            </th>
                            <th scope="col" class="px-2 py-4 font-thin bg-milano border-r-4 border-r-coffee">
                                <div class="flex justify-center items-center">
                                    <x-user class="h-7 w-7" />
                                </div>
                            </th>
                            <th scope="col" class="px-2 py-4 font-thin bg-milano border-r-4 border-r-coffee">
                                <div class="flex justify-center items-center">
                                    <x-truck class="h-10 w-10" />
                                </div>
                            </th>
                            <th scope="col" class="px-4 py-4 font-thin">
                                содержание
                            </th>
                            <th scope="col" class="px-4 py-4 font-thin">
                                рейтинг
                            </th>
                            <th scope="col" class="px-4 py-4 font-thin">
                                дата
                            </th>
                            <th scope="col" class="items-center px-2 py-4 font-pix bg-milano font-thin border-l-4 border-l-coffee">
                                <div class="flex justify-center items-center">
                                    <x-trash class="h-7 w-7" />
                                </div>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($reviews as $review)
                        <tr class="bg-oldpaper hover:bg-brownpaper/30 font-base text-center py-6 border-x-4 border-x-coffee border-b-4 border-b-coffee">
                            <td class="px-2 bg-milano border-r-4 border-r-coffee text-hipnymph hover:text-brownpaper text-2xl font-pix font-thin">{{ $review->id }}</td>
                            <td class="px-2 text-2xl font-pix font-thin">#{{ $review->user_id }}</td>
                            <td class="px-2 text-2xl font-pix font-thin">#{{ $review->transporter_id }}</td>
                            <td class="px-2 text-2xl font-pix font-thin">{{ $review->content }}</td>
                            <td class="px-2 text-2xl font-pix font-thin">{{ $review->rating }}</td>
                            <td class="px-2 text-2xl font-pix font-thin">{{ $review->created_at }}</td>
                            <td class="bg-milano border-l-4 border-l-coffee">
                                <form action="{{ route('settings.clear', $review->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" value="DELETE" class="inline-flex px-2 py-1 items-center font-big text-4xl text-hipnymph tracking-widest hover:text-brownpaper bg-milano">×</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="flex flex-col justify-between items-start py-12 ms-0">
                <h1 class="font-big text-4xl text-coffee leading-tight">
                    {{ __('Заказы') }}
                </h1>
            </div>

            <div class="flex flex-col overflow-x-auto desktop:w-full max-w-full">
                <table class="desktop:w-full max-w-full min-w-screen text-lg text-coffee">
                    <thead class="bg-brownpaper text-coffee border-4 border-coffee text-2xl text-center font-pix uppercase">
                        <tr>
                            <th scope="col" class="px-2 py-4 font-pix bg-milano text-hipnymph font-thin border-r-4 border-r-coffee">
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
                            <th scope="col" class="items-center px-2 py-4 font-pix bg-milano font-thin border-l-4 border-l-coffee">
                                <div class="flex justify-center items-center">
                                    <x-trash class="h-7 w-7" />
                                </div>
                            </th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach($orderData as $data)
                        <tr class="bg-white hover:bg-wevet font-norm text-center py-6 border-y-4 border-y-wevet border-x-4 border-x-bordeaux">
                            <td class="px-2 bg-milano border-r-4 border-r-coffee text-hipnymph hover:text-brownpaper text-2xl font-pix font-thin"><a href="{{ route('orders.show', $data->id) }}">{{ $data->id }}</a></td>
                            <td class="px-2 bg-milano border-r-4 border-r-coffee text-hipnymph hover:text-brownpaper text-2xl font-pix font-thin"> <a href="{{ route('user.profile', $data->id_customer) }}"> {{ $data->id_customer }} </a></td>
                            <td class="px-2 text-2xl font-pix font-thin">{{ $data->cargo_type }}</td>
                            <td class="px-2 text-2xl font-pix font-thin">{{ $data->cargo_describe }}</td>
                            <td class="px-2 text-2xl font-pix font-thin">{{ $data->weight }}</td>
                            <td class="px-2 text-2xl font-pix font-thin">{{ $data->load_place }}</td>
                            <td class="px-2 text-2xl font-pix font-thin">{{ $data->unload_place }}</td>
                            <td class="px-2 text-2xl font-pix font-thin">{{ $data->truck_type }}</td>
                            <td class="px-2 text-2xl font-pix font-thin">{{ $data->cost }}</td>
                            <td class="px-2 text-2xl font-pix font-thin">
                                @if ($data->status === 'processing')
                                <span class="flex items-center justify-center">
                                    ожидание
                                </span>

                                @elseif ($data->status === 'accepted')
                                <span class="flex items-center justify-center">
                                    принят
                                </span>

                                @elseif ($data->status === 'agreed')
                                <span class="flex items-center justify-center">
                                    согласован
                                </span>

                                @elseif ($data->status === 'payable')
                                <span class="flex items-center justify-center">
                                    оплачен
                                </span>

                                @elseif ($data->status === 'departing')
                                <span class="flex items-center justify-center">
                                    отправлен
                                </span>

                                @elseif ($data->status === 'delivered')
                                <span class="flex items-center justify-center">
                                    доставлен
                                </span>
                                @elseif ($data->status === 'deleted')
                                <span class="flex items-center justify-center">
                                    удалён
                                </span>
                                @endif
                            </td>
                            <td class="bg-milano border-l-4 border-l-coffee">
                                <form action="{{ route('settings.delete', $data->id) }}" method="POST">
                                    <button type="submit" value="DELETE" class="inline-flex px-2 py-1 items-center font-big text-4xl text-hipnymph tracking-widest hover:text-brownpaper bg-milano">×</button>
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="flex flex-col justify-between items-start py-12 ms-0">
                <h1 class="font-big text-4xl text-coffee leading-tight">
                    {{ __('Детали заказов') }}
                </h1>
            </div>

            <div class="flex flex-col overflow-x-auto desktop:w-full max-w-full">
                <table class="desktop:w-full max-w-full min-w-screen text-lg text-coffee">
                    <thead class="bg-brownpaper text-coffee border-4 border-coffee text-2xl text-center font-pix uppercase">
                        <tr>
                            <th scope="col" class="px-4 py-4 font-pix bg-milano text-hipnymph font-thin border-r-4 border-r-coffee">
                                №
                            </th>
                            <th scope="col" class="px-2 py-4 font-thin bg-milano border-r-4 border-r-coffee">
                                <div class="flex justify-center items-center">
                                    <x-truck class="h-10 w-10" />
                                </div>
                            </th>
                            <th scope="col" class="px-4 py-4 font-thin">
                                статус
                            </th>
                            <th scope="col" class="px-4 py-4 font-thin">
                                создан
                            </th>
                            <th scope="col" class="px-4 py-4 font-thin">
                                принят
                            </th>
                            <th scope="col" class="px-4 py-4 font-thin">
                                отправлен
                            </th>
                            <th scope="col" class="px-4 py-4 font-thin">
                                доставлен
                            </th>
                            <th scope="col" class="items-center px-2 py-4 font-pix bg-milano font-thin text-hipnymph border-l-4 border-l-coffee">
                                готов
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orderData as $data)

                        @if ($data->status != 'processing')

                        <tr class="bg-white hover:bg-wevet font-norm text-center py-6 border-y-4 border-y-wevet border-x-4 border-x-bordeaux">
                            <td class="text-bordeaux hover:text-white hover:bg-bordeaux font-light font-pix text-2xl py-4">#{{ $data->id }}</td>

                            <td class="text-bordeaux hover:text-white hover:bg-bordeaux font-light font-pix text-2xl">
                                <a href="{{ route('user.profile', $data->id_transporter) }}" class="hover:text-geraldine">#{{ $data->id_transporter }}</a>
                            </td>

                            <td class="hover:bg-white">
                                @if ($data->status === 'processing')
                                <span class="flex items-center justify-center">
                                    ожидание
                                </span>

                                @elseif ($data->status === 'accepted')
                                <span class="flex items-center justify-center">
                                    принят
                                </span>

                                @elseif ($data->status === 'agreed')
                                <span class="flex items-center justify-center">
                                    согласован
                                </span>

                                @elseif ($data->status === 'payable')
                                <span class="flex items-center justify-center">
                                    оплачен
                                </span>

                                @elseif ($data->status === 'departing')
                                <span class="flex items-center justify-center">
                                    отправлен
                                </span>

                                @elseif ($data->status === 'delivered')
                                <span class="flex items-center justify-center">
                                    доставлен
                                </span>
                                @elseif ($data->status === 'deleted')
                                <span class="flex items-center justify-center">
                                    удалён
                                </span>
                                @endif
                            </td>

                            <td class="hover:bg-white">{{ $data->created_at }}</td>
                            <td class="hover:bg-white">{{ $data->accepted_at }}</td>
                            <td class="hover:bg-white">{{ $data->agreed_at }}</td>
                            <td class="hover:bg-white">{{ $data->payable_at }}</td>
                            <td class="hover:bg-white">{{ $data->departing_at}}</td>
                            <td class="hover:bg-white">{{ $data->delivered_at}}</td>
                            <td class="hover:bg-white">{{ $data->ready_date }}</td>
                        </tr>
                        @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>

@else
<x-error-layout>
    <div class="w-full">
        <div class="flex justify-center items-center tablet:px-4 minimal:px-0">
            <div class="min-h-screen flex flex-col items-center p-6 pt-6 bg-[#000000]">
                <div class="w-full">
                    <!-- Heading -->
                    <div class="flex justify-between items-start">
                        <h1 class="laptop:text-6xl tablet:text-6xl minimal:text-4xl font-pix tracking-tight text-[#ff0000]">Доступ запрещён</h1>
                    </div>
                    <!-- Content -->
                    <div class="flex">
                        <h2 class="font-base laptop:text-2xl tablet:text-xl minimal:text-base py-6 text-hipnymph">
                            Сейчас этот маршрут временно недоступен из-за вашего любопытства.
                            <br>
                            Для обеспечения безопасности сайта доступ к нему временно ограничен.
                            <br>
                            Если вы впервые видите это сообщение об ошибке, примите наши поздравления.
                            <br>
                            Вы попали в засекреченный маршрут, но мы не можем предложить вам помощь.
                            <br>
                            <br>
                            Благодарим что исследуете наш сайт!
                        </h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-error-layout>
@endif