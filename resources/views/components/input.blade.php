@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'rounded-md shadow-sm border-gray-300 dark:bg-gray-900 dark:border-gray-700 dark:text-gray-300 focus:border-teal-300 focus:ring focus:ring-teal-200 focus:ring-opacity-50']) !!}>
