<nav id="header" x-data="{ open: false }" class="w-full fixed bg-oldpaper">
    <div class="desktop:flex hidden flex-row justify-between gap-4 items-center py-4 px-4 w-full">

        <!-- Logo -->
        <a href="{{ route('welcome') }}" class="desktop:flex flex-row justify-start gap-2 items-center z-50 hidden cursor-pointer">
            <x-logotype class="w-12" />
            <h1 class="font-pix text-coffee text-4xl">ГрузоМагистр</h1>
        </a>

        <!-- Desktop Menu -->
        <div class="desktop:flex justify-center hidden items-center space-x-4">
            <x-nav-link href="{{ route('welcome') }}" :active="request()->routeIs('welcome')">
                {{ __('Главная') }}
            </x-nav-link>

            @if(Auth::check())
            @if(Auth::user()->role != 'administrator' && Auth::user()->role != 'magister')
            <x-nav-link href="{{ route('orders') }}" :active="request()->routeIs('orders')">
                {{ __('Заказы') }}
            </x-nav-link>
            @endif

            @else
            <x-nav-link href="{{ route('orderscustomer') }}" :active="request()->routeIs('orderscustomer')">
                {{ __('Заказы') }}
            </x-nav-link>
            @endif

            @auth
            @if(Auth::user()->role === 'administrator' || Auth::user()->role === 'magister')
            <x-nav-link href="{{ route('settings') }}" :active="request()->routeIs('settings')">
                {{ __('Настройка') }}
            </x-nav-link>
            @endif
            @endauth

            <x-nav-link href="{{ route('transporters') }}" :active="request()->routeIs('transporters')">
                {{ __('Доставка') }}
            </x-nav-link>

            <x-nav-link href="{{ route('tarifs') }}" :active="request()->routeIs('tarifs')">
                {{ __('Тарифы') }}
            </x-nav-link>

            <x-nav-link href="{{ route('project') }}" :active="request()->routeIs('project')">
                {{ __('Проект') }}
            </x-nav-link>

            <x-nav-link href="{{ route('contacts') }}" :active="request()->routeIs('contacts')">
                {{ __('Контакты') }}
            </x-nav-link>
        </div>

        <!-- Login -->
        <div class="desktop:flex hidden justify-end items-center">
            <!-- Settings Dropdown -->
            <div class="desktop:flex hidden">
                @if(Auth::check())
                <form method="GET" action="{{ route('profile.show') }}">
                    <button class="flex flex-row gap-4 text-xl font-pix">
                        <h1 class="text-coffee text-2xl font-pix font-thin focus:outline-none">{{ Auth::user()->surname }} {{ Auth::user()->name }}</h1>
                        <img class="h-8 w-8 object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                    </button>
                </form>
                @else
                <span class="flex space-x-4 items-center">
                    <x-nav-link href="{{ route('login') }}" :active="request()->routeIs('login')" class="font-pix">
                        {{ __('Войти') }}
                    </x-nav-link>
                </span>
                @endif
            </div>
        </div>
    </div>

    <div class="desktop:hidden flex flex-row justify-between mobile:ps-4 minimal:ps-2 py-4">

        <!-- Logo -->
        <a href="{{ route('welcome') }}" class="minimal:flex desktop:hidden flex-row minimal:gap-2 items-center z-50">
            <x-logotype class="tablet:w-8 minimal:w-7 w-7" />
            <h1 class="minimal:block hidden font-pix text-coffee tablet:text-3xl mobile:text-[1.4rem] minimal:text-[1.2rem] text-base">ГрузоМагистр</h1>
        </a>

        <!-- Mobile Menu -->
        <div class="flex justify-end items-center">

            <!-- Login -->
            <div class="flex justify-end items-center mobile:pr-16 minimal:pr-12 pr-10">
                @if(Auth::check())
                <div class="flex justify-center items-center">
                    <form method="GET" action="{{ route('profile.show') }}">
                        <button class="flex text-xl focus:outline-none transition duration-500 ease-in-out">
                            <img class="h-6 w-6 minimal:h-6 minimal:w-6 tablet:w-8 tablet:h-8 object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                        </button>
                    </form>
                </div>
                @else
                <div class="flex justify-center items-center">
                    <form method="GET" action="{{ route('login') }}">
                        <button class="flex transition duration-500 ease-in-out">
                            <x-login class="h-6 w-6 minimal:h-6 minimal:w-6 tablet:w-8 tablet:h-8" />
                        </button>
                    </form>
                </div>
                @endif
            </div>

            <!-- Hamburger -->
            <div class="absolute flex justify-center items-center z-50">
                <div class="flex justify-center items-center">
                    <button @click="open = ! open" class="flex items-center justify-center mobile:p-4 minimal:p-2 focus:outline-none transition duration-500 ease-in-out">
                        <svg id="hamburger" class="h-8 w-8" stroke="#442D25" fill="none" viewBox="0 0 24 24">
                            <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Responsive Navigation Menu -->
            <div id="mobile-menu" :class="{'fixed': open, 'hidden': ! open}" class="flex justify-center bg-oldpaper minimal:py-2 tablet:pb-4 tablet:pt-4 minimal:pt-[60rem] tablet:mt-24 w-full">
                <div class="grid minimal:grid-cols-1 tablet:grid-cols-6 items-center tablet:gap-x-6 mobile:gap-x-12 minimal:gap-x-10 gap-x-10 tablet:gap-y-6 minimal:gap-y-10 tablet:pb-0 minimal:pb-[15rem]">

                    <x-responsive-nav-link href="{{ route('welcome') }}" :active="request()->routeIs('welcome')" class="text-coffee">
                        {{ __('Главная') }}
                    </x-responsive-nav-link>

                    @if(Auth::check())
                    @if(Auth::user()->role != 'administrator' || Auth::user()->role != 'magister')
                    <x-responsive-nav-link href="{{ route('orders') }}" :active="request()->routeIs('orders')" class="text-coffee">
                        {{ __('Заказы') }}
                    </x-responsive-nav-link>
                    @endif

                    @else
                    <x-responsive-nav-link href="{{ route('orderscustomer') }}" :active="request()->routeIs('orderscustomer')" class="text-coffee">
                        {{ __('Заказы') }}
                    </x-responsive-nav-link>
                    @endif

                    @if(Auth::check())
                    @if(Auth::user()->role === 'administrator' || Auth::user()->role === 'magister')
                    <x-responsive-nav-link href="{{ route('settings') }}" :active="request()->routeIs('settings')" class="text-coffee">
                        {{ __('Настройка') }}
                    </x-responsive-nav-link>
                    @endif
                    @endif

                    <x-responsive-nav-link href="{{ route('transporters') }}" :active="request()->routeIs('transporters')" class="text-coffee">
                        {{ __('Доставка') }}
                    </x-responsive-nav-link>

                    <x-responsive-nav-link href="{{ route('tarifs') }}" :active="request()->routeIs('tarifs')" class="text-coffee">
                        {{ __('Тарифы') }}
                    </x-responsive-nav-link>

                    <x-responsive-nav-link href="{{ route('project') }}" :active="request()->routeIs('project')" class="text-coffee">
                        {{ __('Проект') }}
                    </x-responsive-nav-link>

                    <x-responsive-nav-link href="{{ route('contacts') }}" :active="request()->routeIs('contacts')" class="text-coffee">
                        {{ __('Контакты') }}
                    </x-responsive-nav-link>

                </div>
            </div>
        </div>
    </div>
</nav>