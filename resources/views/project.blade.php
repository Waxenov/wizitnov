<x-app-layout>
    <div class="flex flex-col justify-center items-center laptop:px-10 tablet:px-0 mx-auto">
        <div id="dashboardbg" class="flex justify-start items-center bg-brownpaper/30 mb-20">
            <div class="flex laptop:flex-row minimal:flex-col justify-start">
                <div class="minimal:hidden laptop:flex flex-col justify-between p-4 bg-milano">
                    <h1 class="flex justify-start text-5xl font-pix leading-relaxed text-oldpaper">Что</h1>
                    <h1 class="flex justify-start text-5xl font-pix leading-relaxed text-oldpaper">Было</h1>
                    <h1 class="flex justify-start text-5xl font-pix leading-relaxed text-oldpaper">Дальше</h1>
                </div>
                <div class="minimal:flex laptop:hidden justify-center tablet:pr-10 minimal:pb-4 p-4 bg-milano">
                    <h1 class="flex justify-start font-pix text-oldpaper tablet:text-4xl minimal:text-3xl">Что было дальше</h1>
                </div>
                <div class="flex flex-col justify-center p-4">
                    <h2 class="font-base desktop:text-2xl laptop:text-2xl tablet:text-2xl minimal:text-xl leading-relaxed text-coffee">
                        Чтобы быть в курсе работоспособности сайта, заходите сюда.
                        <br>
                        Будем ждать вас когда вас снова встретит страница ошибки
                        чтобы рассказать о всех изменениях, а также возможностях сайта.
                    </h2>
                </div>
            </div>
        </div>

        <div id="dashboardbg" class="flex justify-start items-center bg-brownpaper/30 mb-20">
            <div class="flex flex-col justify-start">
                <div class="flex flex-col justify-center items-center pr-10 bg-milano py-2">
                    <h1 class="flex justify-start font-pix text-oldpaper tablet:text-4xl minimal:text-3xl">Этапы разработки</h1>
                </div>
                <div class="flex flex-col justify-center pt-10 p-4">
                    @foreach ($stages as $stage)
                    <div class="pb-5">
                        <h1 class="items-center pb-4 tablet:text-2xl minimal:text-2xl font-big leading-relaxed text-coffee">
                            {{ $stage->title }}
                        </h1>
                        <h2 class="pb-4 tablet:text-xl minimal:text-base font-base">{{ $stage->describe }}</h2>
                        <h3 class="text-milano tablet:text-xl minimal:text-base font-big">{{ $stage->day }}</h3>
                    </div>

                    <x-section-border />
                    @endforeach

                    <!-- пагинация -->
                    {{ $stages->links() }}
                </div>
            </div>
        </div>

    </div>

</x-app-layout>