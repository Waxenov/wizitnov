<x-form-section submit="updateProfileInformation">

    <!-- заголовок -->
    <x-slot name="title">
        {{ __('Информация аккаунта') }}
    </x-slot>

    <!-- описание -->
    <x-slot name="description">
        @if (Auth::user()->role === 'magister')
            {{ __('Владелец') }}
            {{ Auth::user()->id }}
        @elseif (Auth::user()->role === 'administrator')
            {{ __('Администратор') }}
            {{ Auth::user()->id }}
        @elseif (Auth::user()->role === 'customer')
            {{ __('Заказчик') }}
            {{ Auth::user()->id }}
        @elseif (Auth::user()->role === 'transporter')
            {{ __('Перевозчик') }}
            {{ Auth::user()->id }}
        @endif

        @if(Auth::user()->status === 'process')
            {{ __('ваш аккаунт не одобрен администрацией.') }}
        @elseif(Auth::user()->status === 'active')
            {{ __('ваш аккаунт одобрен администрацией.') }}
        @elseif(Auth::user()->status === 'block')
            {{ __('ваш аккаунт заблокирован администрацией.') }}
        @endif
    </x-slot>

    <x-slot name="form">
        <!-- фото профиля -->
        <div x-data="{photoName: null, photoPreview: null}" class="col-span-4">
            <!-- загрузка фото -->
            <input type="file" id="photo" class="hidden" wire:model.live="photo" x-ref="photo" x-on:change=" photoName = $refs.photo.files[0].name; const reader = new FileReader(); reader.onload = (e) => { photoPreview = e.target.result;}; reader.readAsDataURL($refs.photo.files[0]);" />
            <x-label for="photo" value="{{ __('Фото') }}" />
            <!-- текущее фото профиля -->
            <div class="mt-2" x-show="! photoPreview">
                <img src="{{ $this->user->profile_photo_url }}" alt="{{ $this->user->name }}" class="h-20 w-20 object-cover">
            </div>
            <!-- новое фото профиля -->
            <div class="mt-2" x-show="photoPreview" style="display: none;">
                <span class="block w-20 h-20 bg-cover bg-no-repeat bg-center" x-bind:style="'background-image: url(\'' + photoPreview + '\');'">
                </span>
            </div>

            <div class="items-center gap-x-4">
                <x-button class="mt-2 me-2" type="button" x-on:click.prevent="$refs.photo.click()">
                    {{ __('Выбрать новое фото') }}
                </x-button>

                @if ($this->user->profile_photo_path)
                <x-button type="button" class="mt-2" wire:click="deleteProfilePhoto">
                    {{ __('Удалить фото') }}
                </x-button>
                @endif
            </div>

            <x-input-error for="photo" class="mt-2" />
        </div>
        <div class="py-4">
            <!-- фамилия -->
            <div class="col-span-6 sm:col-span-4">
                <x-label for="surname" value="{{ __('Фамилия') }}" />
                <x-input id="surname" type="text" class="mt-1 block w-full" wire:model="state.surname" required autocomplete="surname" />
                <x-input-error for="surname" class="mt-2" />
            </div>

            <!-- имя -->
            <div class="col-span-6 sm:col-span-4">
                <x-label for="name" value="{{ __('Имя') }}" />
                <x-input id="name" type="text" class="mt-1 block w-full" wire:model="state.name" required autocomplete="name" />
                <x-input-error for="name" class="mt-2" />
            </div>

            <!-- отчество -->
            <div class="col-span-6 sm:col-span-4">
                <x-label for="patronymic" value="{{ __('Отчество') }}" />
                <x-input id="patronymic" type="text" class="mt-1 block w-full" wire:model="state.patronymic" required autocomplete="patronymic" />
                <x-input-error for="patronymic" class="mt-2" />
            </div>

            <!-- телефон -->
            <div class="col-span-6 sm:col-span-4">
                <x-label for="phone" value="{{ __('Телефон') }}" />
                <x-input id="phone" type="text" class="mt-1 block w-full" wire:model="state.phone" required autocomplete="phone" />
                <x-input-error for="phone" class="mt-2" />
            </div>

            <!-- почта -->
            <div class="col-span-6 sm:col-span-4">
                <x-label for="login" value="{{ __('Почта') }}" />
                <x-input id="login" type="email" class="mt-1 block w-full" wire:model="state.login" required autocomplete="email" />

                <!-- сообщение об ошибках -->
                <x-input-error for="login" class="mt-2" />

            </div>
        </div>
    </x-slot>

    <x-slot name="actions">

        <!-- сообщение об успехе -->
        <x-action-message class="me-3" on="saved">
            {{ __('Сделано') }}
        </x-action-message>

        <!-- кнопка сохранения изменений -->
        <x-button wire:loading.attr="disabled" wire:target="photo">
            {{ __('Сохранить') }}
        </x-button>
    </x-slot>
</x-form-section>