<div class="flex max-h-full py-4">
    <!-- форма для создания заказа -->
    <form class="mx-auto w-full" wire:submit.prevent="submitForm">
        <!-- выбор типа груза -->
        <div>
            <div class="pb-2">
                <x-form-section submit="submitForm">
                    <x-slot name="title" class="font-big">
                        {{ __('Тип груза') }}
                    </x-slot>

                    <x-slot name="description" class="font-base">
                        {{ __('Выберите тип груза из предложенных') }}
                    </x-slot>

                    <x-slot name="form">
                        <div>
                            <form class="mx-auto" wire:submit.prevent="submitForm">
                                <div>
                                    <select class="bg-brownpaper/50 text-coffee border-4 font-base border-coffee text-lg focus:ring-milano focus:border-milano block w-full p-2.5" type="text " wire:model="cargoType" name="cargoType" id="cargoType" required>
                                        <option value="" selected> Выберите тип </option>
                                        <option value="Технический">Технический</option>
                                        <option value="Домашний">Домашний</option>
                                        <option value="Строительный">Строительный</option>
                                        <option value="Мебельный">Мебельный</option>
                                        <option value="Другое">Другое</option>
                                    </select>
                                </div>
                            </form>
                        </div>
                    </x-slot>
                </x-form-section>
            </div>

            <x-section-border />

            <!-- выбор типа кузова -->
            <div>
                <div class="pb-2">
                    <x-form-section submit="submitForm">
                        <x-slot name="title" class="font-big">
                            {{ __('Кузов машины') }}
                        </x-slot>

                        <x-slot name="description" class="font-base">
                            {{ __('Выберите тип кузова из предложенных') }}
                        </x-slot>

                        <x-slot name="form">
                            <div>
                                <form class="mx-auto" wire:submit.prevent="submitForm">
                                    <div>
                                        <select class="bg-brownpaper/50  text-coffee font-base border-4 border-coffee text-lg focus:ring-milano focus:border-milano block w-full p-2.5" type="text" wire:model="truckType" name="truckType" id="truckType" required>
                                            <option selected> Выберите тип </option>
                                            <option value="Фургон">Фургон</option>
                                            <option value="Тент">Тент</option>
                                            <option value="Бортовая">Бортовая</option>
                                        </select>
                                    </div>
                                </form>
                            </div>
                        </x-slot>
                    </x-form-section>
                </div>

                <x-section-border />

                <!-- описание груза -->
                <div class="pb-2">
                    <x-form-section submit="submitForm">
                        <x-slot name="title" class="font-big">
                            {{ __('Описание груза') }}
                        </x-slot>

                        <x-slot name="description" class="font-base">
                            {{ __('Дайте краткое описание вашего груза') }}
                        </x-slot>

                        <x-slot name="form">
                            <div>
                                <form class="mx-auto" wire:submit.prevent="submitForm">
                                    <textarea type="text" wire:model="cargoDescribe" name="cargoDescribe" id="cargoDescribe" rows="2" placeholder="Количество, размеры, хрупкость, пожелания и т.д" class="font-base bg-brownpaper/50 focus:border-dashed text-coffee border-4 border-coffee text-lg focus:ring-milano focus:border-milano block w-full p-2.5 placeholder-coffee" required></textarea>
                                </form>
                            </div>
                        </x-slot>
                    </x-form-section>
                </div>
            </div>

            <x-section-border />

            <div>
                <div class="pb-2">
                    <!-- вес груза -->
                    <x-form-section submit="submitForm">
                        <x-slot name="title" class="font-big">
                            {{ __('Вес груза') }}
                        </x-slot>

                        <x-slot name="description" class="font-base">
                            {{ __('Вес вашего груза в кг') }}
                        </x-slot>

                        <x-slot name="form">
                            <div>
                                <form class="mx-auto" wire:submit.prevent="submitForm">
                                    <x-input class="w-full" type="number" placeholder="100 кг" step="10" min="0" wire:model="weight" name="weight" id="weight" required />
                                </form>
                            </div>
                        </x-slot>
                    </x-form-section>
                </div>

                <x-section-border />

                <div class="pb-2">
                    <!-- дата готовности -->
                    <x-form-section submit="submitForm">
                        <x-slot name="title" class="font-big">
                            {{ __('Дата загрузки') }}
                        </x-slot>

                        <x-slot name="description" class="font-base">
                            {{ __('Минимальная разница между датой создания заказа и датой загрузки должна составлять 3 дня') }}
                        </x-slot>

                        <x-slot name="form">
                            <div>
                                <form class="mx-auto" wire:submit.prevent="submitForm">
                                    <x-input class="w-full" type="date" wire:model="readyDate" name="readyDate" id="readyDate" required />
                                </form>
                            </div>
                        </x-slot>
                    </x-form-section>
                </div>
            </div>

            <x-section-border />

            <div>
                <!-- место загрузки -->
                <div class="pb-2">
                    <x-form-section submit="submitForm">
                        <x-slot name="title" class="font-big">
                            {{ __('Адрес загрузки') }}
                        </x-slot>
                        <x-slot name="description" class="font-base">
                            {{ __('Укажите точное место загрузки груза') }}
                        </x-slot>

                        <x-slot name="form">
                            <div>
                                <form class="mx-auto" wire:submit.prevent="submitForm">
                                    <x-input class="w-full" type="text" wire:model="loadPlace" name="loadPlace" id="loadPlace" placeholder="Омск, Улица Пример 24, к. 1" autocomplete="off" required />
                                </form>
                            </div>
                        </x-slot>
                    </x-form-section>
                </div>

                <x-section-border />

                <!-- место разгрузки -->
                <div class="pb-2">
                    <x-form-section submit="submitForm">
                        <x-slot name="title" class="font-big">
                            {{ __('Адрес разгрузки') }}
                        </x-slot>
                        <x-slot name="description" class="font-base">
                            {{ __('Укажите точное место разгрузки груза') }}
                        </x-slot>

                        <x-slot name="form">
                            <div>
                                <form class="mx-auto" wire:submit.prevent="submitForm">

                                    <x-input class="w-full" type="text" wire:model="unloadPlace" name="unloadPlace" id="unloadPlace" placeholder="Омск, Улица Пример 7, к. 2" autocomplete="off" required />
                                </form>
                            </div>
                        </x-slot>
                    </x-form-section>
                </div>
            </div>

            @if(Auth::check())
                <!-- важная информация -->
                <div class="flex justify-center items-center my-4 w-full">
                    <h3 class="font-pix text-milano laptop:text-2xl tablet:text-xl minimal:text-lg">
                        @if(Auth::user()->status == 'process')
                            {{ __('Ваш аккаунт не активирован') }}
                        @elseif(Auth::user()->status == 'block')
                            {{ __('Ваш аккаунт заблокирован') }}
                        @else
                            {{ __('Перед созданием заказа, прочитайте раздел “Порядок оформления заказа” на главной странице.') }}
                        @endif
                    </h3>
                </div>
            @endif

            <!-- кнопка создания заказа -->
            <div class="flex w-full">
                @if(Auth::check())
                    @if(Auth::user()->role === 'customer' && Auth::user()->status === 'active')
                        <x-button type="submit" class="flex justify-center text-center text-2xl items-center w-full ms-0 border-4">
                            {{ __('Создать заказ') }}
                        </x-button>
                    @elseif(Auth::user()->role === 'customer' && Auth::user()->status === 'block' || Auth::user()->status === 'process')
                        <x-button class="flex justify-center text-center text-2xl items-center w-full ms-0 border-4" disabled>
                            {{ __('Запрещено') }}
                        </x-button>
                    @elseif(Auth::user()->role === 'transporter')
                        <x-button class="flex justify-center text-center text-2xl items-center w-full ms-0 border-4" disabled>
                            {{ __('Запрещено') }}
                        </x-button>
                    @endif
                @else
                    <x-button class="flex justify-center text-center text-2xl items-center w-full ms-0 border-4" disabled>
                        {{ __('Требуется авторизация') }}
                    </x-button>
                @endif
            </div>
        </div>
    </form>
</div>