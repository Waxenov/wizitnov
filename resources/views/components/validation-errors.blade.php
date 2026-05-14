@if ($errors->any())
    <div {{ $attributes }}>
        <div class="font-norm text-lg text-scarlet">{{ __('Упс... Что-то пошло не так') }}</div>
    </div>
@endif
