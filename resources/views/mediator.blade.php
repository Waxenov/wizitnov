<x-error-layout>
    <div class="w-full">
        <div class="flex justify-center items-center tablet:px-4 minimal:px-0">
            <div class="min-h-screen flex flex-col items-center p-6 pt-6 bg-[#000000]">
                <div class="w-full">
                    <!-- Heading -->
                    <div class="flex justify-between items-start">
                        <h1 class="laptop:text-6xl tablet:text-6xl minimal:text-4xl font-pix tracking-tight text-[#ff0000]">Ошибка доступа</h1>
                        <a href="{{ route('project') }}" class="laptop:text-6xl tablet:text-6xl minimal:text-4xl font-pix text-[#ff0000] hover:underline">???</a>
                    </div>
                    <!-- Content -->
                    <div class="flex">
                        <h2 class="font-base laptop:text-2xl tablet:text-xl minimal:text-base py-6 text-hipnymph">
                            Сейчас этот маршрут временно недоступен в связи с техническими работами.
                            <br>
                            Для обеспечения безопасности сайта доступ к нему временно ограничен.
                            <br>
                            Если вы впервые видите это сообщение об ошибке при доступе к сайту, пожалуйста, наберитесь терпения.
                            <br>
                            <br>
                            Просим вас вернуться на сайт позднее, чтобы воспользоваться маршрутом, который вас интересует!
                        </h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</x-error-layout>