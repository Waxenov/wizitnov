<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="logo.svg" type="image/svg+xml">
    <meta name="description" content="Молодой портал грузоперевозок в Омске и области" />
    <meta name="keywords" content="грузомаг, груз, грузы, магистр, перевозчик, малогабаритный груз, малогабаритного груза, доставка грузов, доставка, перевозка, грузоперевозки, грузоперевозки в Омске, грузоперевозки в Омской области">

    <!-- Yandex.Metrika counter -->
    <script type="text/javascript">
        (function(m, e, t, r, i, k, a) {
            m[i] = m[i] || function() {
                (m[i].a = m[i].a || []).push(arguments)
            };
            m[i].l = 1 * new Date();
            for (var j = 0; j < document.scripts.length; j++) {
                if (document.scripts[j].src === r) {
                    return;
                }
            }
            k = e.createElement(t), a = e.getElementsByTagName(t)[0], k.async = 1, k.src = r, a.parentNode.insertBefore(k, a)
        })
        (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

        ym(97081892, "init", {
            clickmap: true,
            trackLinks: true,
            accurateTrackBounce: true,
            webvisor: true
        });
    </script>
    <noscript>
        <div><img src="https://mc.yandex.ru/watch/97081892" style="position:absolute; left:-9999px;" alt="" /></div>
    </noscript>
    <!-- /Yandex.Metrika counter -->

    <title>
        @if(request()->is('orderscustomer'))
        Заказы демо

        @elseif(request()->is('orderstransporter'))
        Заказы демо

        @elseif(request()->is('orders'))
        Мои заказы

        @elseif(request()->is('inworkdemo'))
        Мои заказы демо

        @elseif(request()->is('inwork'))
        Мои заказы

        @elseif(request()->is('profiledemo'))
        Профиль демо

        @elseif(request()->is('showdemo'))
        Заказ демо

        @elseif(request()->is('trashdemo'))
        Корзина демо

        @elseif(request()->is('trash'))
        Корзина

        @elseif(request()->is('create'))
        Создать

        @elseif(request()->is('transporters'))
        Доставка

        @elseif(request()->is('contacts'))
        Контакты

        @elseif(request()->is('project'))
        Проект

        @elseif(request()->is('tarifs'))
        Тарифы

        @else
        {{ config('app.name', 'Грузомагистр') }}
        @endif
    </title>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles
</head>

<body class="desktop:w-full desktop:h-screen max-w-full bg-oldpaper">

    <div class="min-h-screen">
        @livewire('navigation-menu')

        <!-- Navigation Menu -->
        @if (isset($header))
        <header>
            <div id="header" class="desktop:w-full max-w-full py-6 px-6 z-50">
                {{ $header }}
            </div>
        </header>
        @endif

        <!-- Content -->
        <main class="desktop:w-full max-w-full laptop:py-24 tablet:py-20 minimal:pt-14">
            {{ $slot }}
        </main>
    </div>

    @stack('modals')

    @livewireScripts

    <!-- Footer -->
    <x-footer />
</body>

</html>