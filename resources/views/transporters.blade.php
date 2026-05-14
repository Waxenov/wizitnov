<x-app-layout>
    <div class="tablet:pt-10">
        <div class="desktop:w-full max-w-full tablet:px-6 minimal:px-2">

            <!-- заголовок страницы и описание -->
            <div class="laptop:flex tablet:hidden minimal:hidden justify-between items-center mb-10 ms-0">
                <h1 class="font-big text-4xl text-coffee">
                    {{ __('Перевозчики') }}
                </h1>
                <a href="{{ route('tarifs') }}" class="text-milano hover:text-brownpaper items-center text-4xl font-big text-center">
                    <h3 id="login" class="text-milano hover:text-brownpaper items-center text-4xl font-big text-center">
                        {{ __('Тарифы') }}
                    </h3>
                </a>
            </div>

            <div class="laptop:hidden tablet:flex minimal:flex minimal:flex-row justify-between minimal:mb-10 minimal:mt-4 ms-0">
                <h1 class="font-big minimal:text-2xl tablet:text-4xl text-coffee">
                    {{ __('Перевозчики') }}
                </h1>
                <a href="{{ route('tarifs') }}" class="text-milano hover:text-brownpaper minimal:text-2xl tablet:text-4xl font-big">
                    <h3 id="login" class="text-milano hover:text-brownpaper minimal:text-2xl tablet:text-4xl font-big">
                        {{ __('Тарифы') }}
                    </h3>
                </a>
            </div>

            <!-- поиск -->
            <div class="flex mx-auto mb-10 items-end px-0">
                <div class="flex w-full h-fit">
                    @if (Auth::check())
                        <form action="{{ route('transporters') }}" method="GET" class="w-full">
                            <div class="flex max-w-full max-h-fit">
                                <x-input type="text" name="search" placeholder="поиск перевозчиков" class="text-center w-full block tablet:px-4 minimal:px-2 focus:outline-none" autocomplete="off"></x-input>
                                <button id="searchbtn" type="submit" class="tablet:px-4 minimal:px-2 bg-brownpaper -ms-2 border-4 border-coffee">
                                    <svg id="search" class="minimal:h-6 minimal:w-6 tablet:w-8 tablet:h-8" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="#442d25" viewBox="0 0 73.09 73.09">
                                        <path d="M36,45H9L0,36V9L9,0h27l9,9v27l-9,9Z" />
                                        <rect x="53.5" y="41.16" width="9" height="33.68" transform="translate(-24.02 58) rotate(-45)" />
                                    </svg>
                                </button>
                            </div>
                        </form>
                    @else
                        <form class="w-full">
                            <div class="flex max-w-full max-h-fit">
                                <x-input type="text" placeholder="поиск перевозчиков" class="text-center w-full block tablet:px-4 minimal:px-2 focus:outline-none" autocomplete="off"></x-input>
                                <button id="searchbtn" type="submit" class="tablet:px-4 minimal:px-2 bg-brownpaper -ms-2 border-4 border-coffee">
                                    <svg id="search" class="minimal:h-6 minimal:w-6 tablet:w-8 tablet:h-8" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="#442d25" viewBox="0 0 73.09 73.09">
                                        <path d="M36,45H9L0,36V9L9,0h27l9,9v27l-9,9Z" />
                                        <rect x="53.5" y="41.16" width="9" height="33.68" transform="translate(-24.02 58) rotate(-45)" />
                                    </svg>
                                </button>
                            </div>
                        </form>
                    @endif
                </div>
            </div>

            <!-- список перевозчиков -->
            <div class="tablet:hidden minimal:hidden laptop:flex overflow-x-auto laptop:w-full max-w-full">
                <table class="laptop:w-full max-w-full min-w-screen text-lg text-coffee">
                    <thead class="bg-brownpaper text-coffee border-4 border-coffee text-2xl text-center font-pix uppercase">
                        <tr>
                            <th scope="col" class="px-2 py-4 font-pix bg-milano text-hipnymph font-thin border-r-4 border-r-coffee">
                                №
                            </th>
                            <th scope="col" class="px-2 py-4 font-pix bg-milano text-hipnymph font-thin border-r-4 border-r-coffee">
                                доступ
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
                            <th scope="col" class="items-center px-2 py-4 font-pix bg-milano text-hipnymph font-thin border-l-4 border-l-coffee">
                                телефон
                            </th>
                        </tr>
                    </thead>

                    <!-- данные перевозчиков -->
                    <tbody>
                        @if(Auth::check())
                            @if(Auth::user()->status == 'active')
                                @foreach($transporters as $transporter)
                                    <tr class="bg-oldpaper hover:bg-hipnymph font-base text-center py-6 border-x-4 border-x-coffee border-b-4 border-b-coffee">
                                        <td class="px-2 py-2 bg-milano border-r-4 border-r-coffee">
                                            <a href="{{ route('user.profile', $transporter->id) }}" class="text-hipnymph hover:text-brownpaper text-2xl font-pix font-thin">{{ $transporter->id }}</a>
                                        </td>
                                        <td class="px-2 py-2 bg-milano text-hipnymph border-r-4 border-r-coffee">
                                            @if($transporter->status == 'active')
                                                <span>есть</span>
                                            @else
                                                <span>нет</span>
                                            @endif
                                        </td>
                                        <td class="px-2">{{ $transporter->surname }}</td>
                                        <td class="px-2">{{ $transporter->name }}</td>
                                        <td class="px-2">{{ $transporter->patronymic }}</td>
                                        <td class="px-2 py-2 bg-milano text-hipnymph border-l-4 border-l-coffee">{{ $transporter->phone }}</td>
                                    </tr>
                                @endforeach
                            @else
                                <tr class="bg-oldpaper hover:bg-hipnymph font-base text-center py-6 border-x-4 border-x-coffee border-b-4 border-b-coffee">
                                    <td class="px-2 bg-milano border-r-4 border-r-coffee text-hipnymph hover:text-brownpaper text-2xl font-pix font-thin">—</td>
                                    <td class="px-2 bg-milano border-r-4 border-r-coffee text-hipnymph hover:text-brownpaper text-2xl font-pix font-thin">—</td>
                                    <td class="px-2 font-pix text-2xl">—</td>
                                    <td class="px-2 font-pix text-2xl">—</td>
                                    <td class="px-2 font-pix text-2xl">—</td>
                                    <td class="px-2 border-l-4 border-l-coffee bg-milano text-hipnymph text-2xl font-pix font-thin">—</td>
                                </tr>
                            @endif
                        @else
                        <tr class="bg-oldpaper hover:bg-hipnymph font-base text-center py-6 border-x-4 border-x-coffee border-b-4 border-b-coffee">
                            <td class="px-2 py-2 bg-milano border-r-4 border-r-coffee text-hipnymph hover:text-brownpaper text-2xl font-pix font-thin"><a href="{{ route('profiledemo') }}"> 1 </a></td>
                            <td class="px-2 py-2 bg-milano text-hipnymph border-r-4 border-r-coffee">нет</td>
                            <td class="px-2">Петров</td>
                            <td class="px-2">Пётр</td>
                            <td class="px-2">Петрович</td>
                            <td class="px-2 py-2 bg-milano text-hipnymph border-l-4 border-l-coffee">7000000001</td>
                        </tr>
                        <tr class="bg-oldpaper hover:bg-hipnymph font-base text-center py-6 border-x-4 border-x-coffee border-b-4 border-b-coffee">
                            <td class="px-2 py-2 bg-milano border-r-4 border-r-coffee text-hipnymph hover:text-brownpaper text-2xl font-pix font-thin"><a href="{{ route('profiledemo') }}"> 2 </a></td>
                            <td class="px-2 py-2 bg-milano text-hipnymph border-r-4 border-r-coffee">есть</td>
                            <td class="px-2">Иванов</td>
                            <td class="px-2">Иван</td>
                            <td class="px-2">Иванович</td>
                            <td class="px-2 py-2 bg-milano text-hipnymph border-l-4 border-l-coffee">7000000002</td>
                        </tr>
                        <tr class="bg-oldpaper hover:bg-hipnymph font-base text-center py-6 border-x-4 border-x-coffee border-b-4 border-b-coffee">
                            <td class="px-2 py-2 bg-milano border-r-4 border-r-coffee text-hipnymph hover:text-brownpaper text-2xl font-pix font-thin"><a href="{{ route('profiledemo') }}"> 3 </a></td>
                            <td class="px-2 py-2 bg-milano text-hipnymph border-r-4 border-r-coffee">есть</td>
                            <td class="px-2">Дмитриев</td>
                            <td class="px-2">Дмитрий</td>
                            <td class="px-2">Дмитриевич</td>
                            <td class="px-2 py-2 bg-milano text-hipnymph border-l-4 border-l-coffee">7000000003</td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>

            @if(Auth::check())
                @if(Auth::user()->status == 'process')
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
            @endif

            <div class="laptop:hidden minimal:flex flex-col flex gap-y-4 w-full">
                @if(Auth::check())
                    @if(Auth::user()->status == 'active')
                        @foreach($transporters as $transporter)
                            <div id="cardorder" class="flex w-full flex-col justify-center items-center mb-4 border-4 border-coffee bg-oldpaper">
                                <div class="w-full grid grid-cols-2 items-center py-2 px-2 bg-milano">
                                    <h1 class="flex justify-start text-oldpaper text-2xl font-pix"> Перевозчик <a href="{{ route('user.profile', $transporter->id) }}" class="text-oldpaper text-2xl ml-2 font-pix font-thin"> #{{ $transporter->id }} </a> </h1>
                                    <div class="flex justify-end items-center">
                                        @if($transporter->status == 'active')
                                            <x-user-approved class="w-6 h-6"/>
                                        @else
                                            <x-user-pending class="w-6 h-6"/>
                                        @endif
                                    </div>
                                </div>
                                <div class="w-full">
                                    <div id="cardorderbg" class="bg-brownpaper/30 px-4 border-t-4 border-t-coffee">
                                        <ul>
                                            <li class="flex flex-col justify-between font-base text-start py-2">
                                                <h1 class="text-coffee font-thin font-big text-xl"> ФИО </h1>
                                                <h2 class="text-coffee font-thin font-base text-start text-lg">
                                                    {{ $transporter->surname }}
                                                    {{ $transporter->name }}
                                                    {{ $transporter->patronymic }}
                                                </h2>
                                            </li>
                                            <li class="flex flex-col justify-between font-base text-start py-2">
                                                <h1 class="text-coffee font-thin font-big text-xl"> Телефон </h1>
                                                <h2 class="text-coffee font-thin font-base text-start text-lg"> {{ $transporter->phone }} </h2>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                @else
                    <div id="cardorder" class="flex w-full flex-col justify-center items-center mb-4 border-4 border-coffee bg-oldpaper">
                        <div class="w-full items-center py-2 px-2">
                            <h1 class="text-coffee text-2xl font-pix"> Перевозчик <a href="{{ route('profiledemo') }}"> #1 </a></h1>
                        </div>
                        <div class="w-full">
                            <div id="cardorderbg" class="bg-brownpaper/30 px-4 border-t-4 border-t-coffee">
                                <ul>
                                    <li class="flex flex-col justify-between font-base text-start py-2">
                                        <h1 class="text-coffee font-thin font-big text-xl"> ФИО </h1>
                                        <h2 class="text-coffee font-thin font-base text-start text-lg"> Петров Пётр Петрович </h2>
                                    </li>
                                    <li class="flex flex-col justify-between font-base text-start py-2">
                                        <h1 class="text-coffee font-thin font-big text-xl"> Телефон </h1>
                                        <h2 class="text-coffee font-thin font-base text-start text-lg"> 7000000001 </h2>
                                    </li>
                                    <li class="flex flex-col justify-between font-base text-start py-2">
                                        <h1 class="text-coffee font-thin font-big text-xl"> Доступ </h1>
                                        <h2 class="text-coffee font-thin font-base text-start text-lg"> нет </h2>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div id="cardorder" class="flex w-full flex-col justify-center items-center mb-4 border-4 border-coffee bg-oldpaper">
                        <div class="w-full items-center py-2 px-2">
                            <h1 class="text-coffee text-2xl font-pix"> Перевозчик <a href="{{ route('profiledemo') }}"> #2 </a></h1>
                        </div>
                        <div class="w-full">
                            <div id="cardorderbg" class="bg-brownpaper/30 px-4 border-t-4 border-t-coffee">
                                <ul>
                                    <li class="flex flex-col justify-between font-base text-start py-2">
                                        <h1 class="text-coffee font-thin font-big text-xl"> ФИО </h1>
                                        <h2 class="text-coffee font-thin font-base text-start text-lg"> Иванов Иван Иванович </h2>
                                    </li>
                                    <li class="flex flex-col justify-between font-base text-start py-2">
                                        <h1 class="text-coffee font-thin font-big text-xl"> Телефон </h1>
                                        <h2 class="text-coffee font-thin font-base text-start text-lg"> 7000000002 </h2>
                                    </li>
                                    <li class="flex flex-col justify-between font-base text-start py-2">
                                        <h1 class="text-coffee font-thin font-big text-xl"> Доступ </h1>
                                        <h2 class="text-coffee font-thin font-base text-start text-lg"> есть </h2>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div id="cardorder" class="flex w-full flex-col justify-center items-center mb-4 border-4 border-coffee bg-oldpaper">
                        <div class="w-full items-center py-2 px-2">
                            <h1 class="text-coffee text-2xl font-pix"> Перевозчик <a href="{{ route('profiledemo') }}"> #3 </a></h1>
                        </div>
                        <div class="w-full">
                            <div id="cardorderbg" class="bg-brownpaper/30 px-4 border-t-4 border-t-coffee">
                                <ul>
                                    <li class="flex flex-col justify-between font-base text-start py-2">
                                        <h1 class="text-coffee font-thin font-big text-xl"> ФИО </h1>
                                        <h2 class="text-coffee font-thin font-base text-start text-lg"> Дмитриев Дмитрий Дмитриевич </h2>
                                    </li>
                                    <li class="flex flex-col justify-between font-base text-start py-2">
                                        <h1 class="text-coffee font-thin font-big text-xl"> Телефон </h1>
                                        <h2 class="text-coffee font-thin font-base text-start text-lg"> 7000000003 </h2>
                                    </li>
                                    <li class="flex flex-col justify-between font-base text-start py-2">
                                        <h1 class="text-coffee font-thin font-big text-xl"> Доступ </h1>
                                        <h2 class="text-coffee font-thin font-base text-start text-lg"> есть </h2>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>