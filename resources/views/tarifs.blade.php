<x-app-layout>
    <div class="w-full laptop:px-10 tablet:px-0 mx-auto">
        <div class="flex flex-col justify-center items-center">
            <div class="w-full">
                <div id="dashboardbg" class="flex justify-start items-center bg-brownpaper/30 tablet:mb-20 mobile:mb-10 minimal:mb-8">
                    <div class="flex laptop:flex-row minimal:flex-col justify-start">
                        <div class="minimal:hidden laptop:flex flex-col justify-between p-4 bg-milano">
                            <h1 class="flex justify-start text-5xl font-pix leading-relaxed text-oldpaper">Тарифы</h1>
                            <h1 class="flex justify-start text-5xl font-pix leading-relaxed text-oldpaper">Наших</h1>
                            <h1 class="flex justify-start text-5xl font-pix leading-relaxed text-oldpaper">Услуг</h1>
                        </div>
                        <div class="minimal:flex laptop:hidden justify-center items-center tablet:pr-10 minimal:pb-4 p-4 bg-milano">
                            <h1 class="flex justify-start font-pix text-oldpaper tablet:text-4xl minimal:text-3xl">Тарифы наших услуг</h1>
                        </div>
                        <div class="flex flex-col justify-center p-4">
                            <h2 class="font-base desktop:text-2xl laptop:text-2xl tablet:text-2xl minimal:text-xl leading-relaxed text-coffee">
                                Есть два вида тарифов: городской и областной. Они отличаются платой за километры.
                            </h2>
                            <br>
                            <h2 class="font-base desktop:text-2xl laptop:text-2xl tablet:text-2xl minimal:text-xl leading-relaxed text-coffee">
                                Ниже приведены оба вида тарифов с описанием.
                            </h2>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mx-auto w-full laptop:pb-20 mobile:pb-10 minimal:pb-8">
                <div class="flex justify-center items-center mx-auto bg-milano py-2">
                    <h1 class="flex justify-start font-pix text-oldpaper tablet:text-4xl minimal:text-3xl">Описание тарифов</h1>
                </div>
                <div id="dashboardbg" class="mx-auto bg-brownpaper/30 minimal:py-4 p-4">
                    <div class="pb-4">
                        <h1 class="items-center tablet:text-2xl minimal:text-xl font-big leading-relaxed text-coffee">
                            Зона городского тарифа находится в г.Омске.
                        </h1>
                        <h2 class="py-4 tablet:text-xl minimal:text-base font-base text-coffee">
                            Стоимость такого тарифа составляет 1500 рублей за выезд.
                        </h2>
                    </div>
                    <div>
                        <h1 class="items-center tablet:text-2xl minimal:text-xl font-big leading-relaxed text-coffee">
                            Зона областного тарифа находится в за пределами г.Омска.
                        </h1>
                        <h2 class="py-4 tablet:text-xl minimal:text-base font-base text-coffee">
                            Стоимость такого тарифа составляет 1500 рублей за выезд + 50 рублей за километр по области.
                        </h2>
                    </div>
                </div>
            </div>

        </div>
</x-app-layout>