<x-app-layout>
    <div class="laptop:pt-10 minimal:pt-4 tablet:pt-0">
        <div class="desktop:w-full max-w-full tablet:px-6 minimal:px-2">

            <!-- заголовок страницы и описание -->
            <div class="laptop:flex tablet:hidden minimal:hidden justify-between items-center mb-10 ms-0">
                <div>
                    <div class="cardheadfaq">
                        <h1 class="font-big text-4xl text-coffee">
                            {{ __('Мои заказы') }}
                        </h1>
                        <button class="text-brownpaper text-2xl font-big font-thin toggle-btn flex justify-center items-center">
                            ▼
                        </button>
                    </div>
                    <div class="collapsed hidden">
                        <a href="{{ route('orderscustomer') }}" class="text-milano hover:text-brownpaper items-center text-4xl font-big">
                            <h3 id="login" class="text-milano hover:text-brownpaper items-center text-4xl font-big">
                                {{ __('Заказчик') }}
                            </h3>
                        </a>
                    </div>
                </div>

                <a href="{{ route('orderstransporter') }}" class="text-milano hover:text-brownpaper items-center text-4xl font-big text-center">
                    <h3 id="login" class="text-milano hover:text-brownpaper items-center text-4xl font-big text-center">
                        {{ __('Новые заказы') }}
                    </h3>
                </a>
            </div>

            <div class="laptop:hidden tablet:flex minimal:flex minimal:flex-row justify-between minimal:mb-10 ms-0">
                <div>
                    <div class="cardheadfaq">
                        <h1 class="font-big minimal:text-2xl tablet:text-4xl text-coffee">
                            {{ __('Мои заказы') }}
                        </h1>
                        <button class="text-brownpaper tablet:text-2xl minimal:text-lg font-big font-thin toggle-btn flex justify-center items-center">
                            ▼
                        </button>
                    </div>
                    <div class="collapsed hidden">
                        <a href="{{ route('orderscustomer') }}" class="text-milano hover:text-brownpaper items-center font-big minimal:text-2xl tablet:text-4xl">
                            <h3 id="login" class="text-milano hover:text-brownpaper items-center font-big minimal:text-2xl tablet:text-4xl">
                                {{ __('Заказчик') }}
                            </h3>
                        </a>
                    </div>
                </div>

                <a href="{{ route('orderstransporter') }}" class="text-milano hover:text-brownpaper minimal:text-2xl tablet:text-4xl items-center font-big text-center">
                    <h3 id="login" class="text-milano hover:text-brownpaper minimal:text-2xl tablet:text-4xl font-big">
                        {{ __('Новые') }}
                    </h3>
                </a>
            </div>

            <!-- поиск -->
            <div class="flex mx-auto mb-10 items-end px-0">
                <div class="flex w-full h-fit">
                    <form class="w-full">
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
                        <tr class="bg-oldpaper hover:bg-hipnymph font-base text-center py-6 border-x-4 border-x-coffee border-b-4 border-b-coffee">
                            <td class="px-2 py-2 bg-milano border-r-4 border-r-coffee text-hipnymph hover:text-brownpaper text-2xl font-pix font-thin"><a href="{{ route('showdemo') }}"> 2 </a></td>
                            <td class="px-2 bg-milano border-r-4 border-r-coffee text-hipnymph hover:text-brownpaper text-2xl font-pix font-thin"><a href="{{ route('profiledemo') }}"> 0 </a></td>
                            <td class="px-2"> Технический </td>
                            <td class="px-2"> Компьютер, стиралка, сушилка </td>
                            <td class="px-2"> 100 кг </td>
                            <td class="px-2">00.00.0000</td>
                            <td class="px-2"> Пункт А </td>
                            <td class="px-2"> Пункт Б </td>
                            <td class="px-2"> Фургон </td>
                            <td class="px-2"> 1500 ₽ </td>
                            <td class="px-2">
                                <span class="flex items-center justify-center">
                                    принят
                                </span>
                            </td>
                            <td class="bg-milano border-l-4 border-l-coffee">
                                <span class="flex items-center justify-center font-pix text-xl text-hipnymph hover:text-oldpaper cursor-pointer">
                                    оплачен
                                </span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- карточки заказов -->
            <div class="laptop:hidden minimal:flex flex-col flex gap-y-4 w-full">
                <div id="cardorder" class="flex w-full flex-col justify-center items-center mb-4 border-4 border-coffee bg-oldpaper">
                    <div class="cardhead w-full items-center py-2 px-2">
                        <h1 class="text-coffee text-2xl font-pix"> Заказ #<a href="{{ route('showdemo') }}"> 0 </a> </h1>
                        <span class="flex justify-start">
                            <span class="flex items-center justify-center">
                                <x-status-accepted class="h-7 w-7" />
                            </span>
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
                                        0
                                    </h2>
                                </li>
                                <li class="flex flex-col justify-between font-base text-start py-2">
                                    <h1 class="text-coffee font-thin font-big text-xl"> Тип </h1>
                                    <h2 class="text-coffee font-thin font-base text-start text-lg"> 0 </h2>
                                </li>
                                <li class="flex flex-col justify-between font-base text-start py-2">
                                    <h1 class="text-coffee font-thin font-big text-xl"> Описание </h2>
                                        <h2 class="text-coffee font-thin font-base text-start text-xl"> 0 </h2>
                                </li>
                                <li class="flex flex-col justify-between font-base text-start py-2">
                                    <h1 class="text-coffee font-thin font-big text-xl"> Вес </h1>
                                    <h2 class="text-coffee font-thin font-base text-start text-xl"> 0 </h2>
                                </li>
                                <li class="flex flex-col justify-between font-base text-start py-2">
                                    <h1 class="text-coffee font-thin font-big text-xl"> Адрес загрузки </h1>
                                    <h2 class="text-coffee font-thin font-base text-start text-xl"> 0 </h2>
                                </li>
                                <li class="flex flex-col justify-between font-base text-start py-2">
                                    <h1 class="text-coffee font-thin font-big text-xl"> Адрес разгрузки </h1>
                                    <h2 class="text-coffee font-thin font-base text-start text-xl"> 0 </h2>
                                </li>
                                <li class="flex flex-col justify-between font-base text-start py-2">
                                    <h1 class="text-coffee font-thin font-big text-xl"> Машина </h1>
                                    <h2 class="text-coffee font-thin font-base text-start text-xl"> 0 </h2>
                                </li>
                                <li class="flex flex-col justify-between font-base text-start py-2">
                                    <h1 class="text-coffee font-thin font-big text-xl"> Цена </h1>
                                    <h2 class="text-coffee font-thin font-base text-start text-xl"> 0 </h2>
                                </li>
                                <li class="w-full flex flex-col justify-between items-center text-center py-2 border-t-4 border-t-milano">
                                    <button class="inline-flex px-1 py-1 items-center text-center font-thin font-pix text-xl text-hipnymph bg-milano">
                                        сменить статус
                                    </button>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>