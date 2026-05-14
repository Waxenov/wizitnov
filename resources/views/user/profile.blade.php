<x-app-layout>
    <div class="max-w-3xl mx-auto pt-10 ">
        <section id="card">
            <div class="items-center bg-milano p-4">
                <h1 class="text-4xl font-pix tracking-tight text-center text-oldpaper">
                    @if ($user->role === 'transporter')
                        {{ __('Перевозчик') }}
                    @elseif ($user->role === 'customer')
                        {{ __('Заказчик') }}
                    @elseif ($user->role === 'administrator')
                        {{ __('Администратор') }}
                    @elseif ($user->role === 'magister')
                        {{ __('Владелец') }}
                    @endif
                    #{{ $user->id }}
                </h1>
            </div>

            <div id="dashboardbg" class="p-4 bg-brownpaper/30 items-center">
                <div class="items-center">
                    <div id="dashboard" class="grid grid-cols-3 bg-oldpaper items-center">

                        <div class="items-center p-4">
                            <h1 class="items-center">
                                <img class="h-24 w-24 object-cover items-center" src="{{ $user->profile_photo_url }}" />
                            </h1>
                        </div>

                        <div class="items-center">
                            <div class="grid grid-rows-3 items-center">
                                <h2 class="font-base items-center laptop:text-xl minimal:text-lg text-coffee">{{ $user->surname }}</h2>
                                <h2 class="font-base items-center laptop:text-xl minimal:text-lg text-coffee">{{ $user->name }}</h2>
                                <h2 class="font-base items-center laptop:text-xl minimal:text-lg text-coffee">{{ $user->patronymic }}</h2>
                            </div>
                        </div>

                        <div class="items-center">
                            @if($user->phone != null)
                                <h2 class="font-base items-center laptop:text-xl minimal:text-lg text-coffee">{{ $user->phone }}</h2>
                                <h2 class="font-base items-center laptop:text-xl minimal:text-lg text-coffee pt-2">связан с банком</h2>
                            @else
                                <h2 class="font-base items-center laptop:text-xl minimal:text-lg text-coffee pt-2"> нет телефона </h2>
                            @endif
                        </div>

                    </div>

                    <div id="dashboard" class="mt-4 items-center w-full">
                        <div class="grid grid-cols-2 p-4 bg-oldpaper items-center">
                            <h2 class="font-big items-center text-start laptop:text-xl minimal:text-lg text-coffee">{{ __('Статус доступа') }}</h2>
                            <h2 class="font-base items-center text-end laptop:text-xl minimal:text-lg text-coffee">
                                @if($user->status === 'active')
                                    @if($user->role === 'magister')
                                        {{ __('Абсолютный') }}
                                    @else
                                        {{ __('Активен') }}
                                    @endif
                                @elseif($user->status === 'block')
                                    {{ __('Заблокирован') }}
                                @elseif($user->status === 'process')
                                    {{ __('Не одобрен') }}
                                @endif
                            </h2>
                        </div>
                    </div>

                </div>
            </div>
        </section>
    </div>

    @if($user->role === 'customer' || $user->role === 'transporter')
        <div class="max-w-3xl mx-auto pt-10 ">
            <section id="card">
                <div class="items-center bg-milano p-4">
                    <h1 class="text-4xl font-pix tracking-tight text-center text-oldpaper">{{ __('Статистика') }}</h1>
                </div>
                <div id="dashboardbg" class="p-4 bg-brownpaper/30 items-center">
                    <div class="items-center grid grid-cols-2">
                        <div id="dashboard" class="grid grid-cols-2 items-center bg-oldpaper mr-4 p-4">
                            <h1 class="font-big items-center laptop:text-2xl minimal:text-xl text-coffee">
                                {{ __('Заказы') }}
                            </h1>
                            @if ($user->role === 'customer')
                            @foreach ($customers as $customer)
                            @if ($customer->login === $user->login)
                            <h2 class="flex justify-end font-base items-center laptop:text-xl minimal:text-lg text-coffee">{{ $customer->orders_count }}</h2>
                            @endif
                            @endforeach
                            @elseif ($user->role === 'transporter')
                            @foreach ($transporters as $transporter)
                            <h2 class="flex justify-end font-base items-center laptop:text-xl minimal:text-lg text-coffee">{{ $transporter->orders_count }}</h2>
                            @endforeach
                            @endif
                        </div>
                        @if ($user->role === 'transporter')
                        <div id="dashboard" class="grid grid-cols-2 items-center bg-oldpaper p-4">
                            <h1 class="font-big items-center laptop:text-2xl minimal:text-xl text-coffee">
                                {{ __('Рейтинг') }}
                            </h1>
                            <h2 class="flex justify-end font-base items-center laptop:text-xl minimal:text-lg text-coffee">
                                {{ $averageRating ? number_format($averageRating, 1) : 'Нет отзывов' }}
                            </h2>
                        </div>
                        @endif
                    </div>
                </div>
            </section>
        </div>
    @else
    
    @endif

    @if ($user->role === 'transporter')
    <div class="max-w-3xl mx-auto pt-10 ">
        <section id="card">
            <div class="items-center bg-milano p-4">
                <h1 class="text-4xl font-pix tracking-tight text-center text-oldpaper">{{ __('Оставить отзыв') }}</h1>
            </div>
            <div id="dashboardbg" class="p-4 bg-brownpaper/30 items-center">
                <div class="items-center">
                    @foreach ($reviews as $review)
                    <div id="dashboard" class="items-center bg-oldpaper p-4">
                        <div class="items-center">
                            <h1 class="font-big items-center laptop:text-2xl minimal:text-xl text-coffee">{{ $review->user->name }}</h1>
                            <h2 class="font-base items-center laptop:text-xl minimal:text-lg text-coffee"> {{ $review->content }}</h2>
                            <h3 class="font-pix items-center mb-2 text-xl minimal:text-lg text-milano">{{ str_repeat('★', $review->rating) }}</h3>
                            <h2 class="font-base items-center text-xl minimal:text-lg text-milano">{{ $review->created_at->format('d.m.Y H:i') }}</h2>
                        </div>
                    </div>
                    @endforeach
                </div>
                @auth
                <div class="text-left items-center">
                    <div class="grid grid-cols-1 items-center w-full">
                        <form action="{{ route('user.reviews.store', $user->id) }}" method="POST">
                            @csrf
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label for="content" class="block text-sm font-medium text-gray-700">{{ __('Содержание') }}</label>
                                    <textarea id="content" name="content" rows="3" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"></textarea>
                                </div>
                                <div>
                                    <div>
                                        <label for="rating" class="block text-sm font-medium text-gray-700">{{ __('Рейтинг') }}</label>
                                        <select id="rating" name="rating" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                        </select>
                                    </div>
                                    <div>
                                        <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">{{ __('Оставить отзыв') }}</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                @endauth
            </div>
        </section>
    </div>
    @endif
</x-app-layout>