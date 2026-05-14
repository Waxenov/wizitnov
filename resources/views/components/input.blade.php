@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'bg-brownpaper/50 focus:bg-oldpaper focus:border-dashed focus:text-coffee text-coffee tablet:text-2xl minimal:text-lg font-base border-4 border-coffee focus:border-coffee focus:ring-0 placeholder:text-coffee']) !!}>