@php
$classes = 'block inline-flex items-center px-4 py-2 border border-transparent rounded-md font-semibold text-gray-700 dark:text-gray-400 hover:bg-gray-50 dark:hover:bg-gray-800 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150';
@endphp

@if($attributes->get('href'))
<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
@else
<button {{ $attributes->merge(['type' => 'submit', 'class' => $classes]) }}>
    {{ $slot }}
</button>
@endif
