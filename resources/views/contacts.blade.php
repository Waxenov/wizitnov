<x-app-layout>
    <div class="w-full laptop:px-10 tablet:px-0 mx-auto tablet:pt-0 minimal:pt-4">
        <div class="flex flex-col justify-center items-center">

            <div class="mx-auto w-full laptop:pb-20 mobile:pb-10 minimal:pb-8">
                <div class="flex justify-center items-center mx-auto bg-milano py-2">
                    <h1 class="flex justify-start font-pix text-oldpaper tablet:text-4xl minimal:text-3xl">Контактные данные</h1>
                </div>
                <div id="dashboardbg" class="mx-auto bg-brownpaper/50 minimal:py-4 p-4">
                    <h1 class="items-center tablet:text-2xl minimal:text-xl font-big leading-relaxed text-coffee">
                        Проект разрабатывается командой профессионалов.
                    </h1>
                    <h2 class="py-4 tablet:text-xl minimal:text-base font-base text-coffee">
                        Все возможные подробности публикуются на странице <a href="{{ route('project') }}" class="text-milano hover:underline">Проект</a>.
                    </h2>
                    <h1 class="tablet:text-xl minimal:text-base font-base text-coffee">
                        Проект ГрузоМагистр оказывает услуги в Омске и области.
                    </h1>
                </div>
                <div id="dashboardbg" class="mx-auto bg-brownpaper/50 minimal:py-4 p-4">
                    <h1 class="items-center tablet:text-2xl minimal:text-xl font-big leading-relaxed text-coffee">
                        Служба клиентского сервиса
                    </h1>
                    <h2 class="pt-4 tablet:text-xl minimal:text-base font-base text-milano">
                        help@gruzomagister.ru
                    </h2>
                    <h2 class="pt-4 tablet:text-xl minimal:text-base font-base text-coffee">
                        +7 999 999-99-99
                    </h2>
                </div>
            </div>

        </div>
</x-app-layout>