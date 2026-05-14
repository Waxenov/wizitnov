<div class="w-full">
    <div class="flex flex-col justify-center items-center w-full h-screen">

        <div id="card" class="flex flex-col justify-center items-center">
            <div class="hidden">
                <div id="logo-theme">
                </div>
            </div>

            <div id="cardin" class="max-w-md px-6 pt-6 pb-4 text-coffee">
                {{ $slot }}
            </div>
        </div>
    </div>
</div>