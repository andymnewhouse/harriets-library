@props(['block' => false])

@php
    $classes = "inline-flex items-center px-4 py-2 bg-gradient-to-r from-teal-500 to-cyan-600 hover:from-teal-600 hover:to-cyan-700 border border-transparent rounded-md font-semibold text-white focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150";

    if($block) {
        $classes = "w-full text-center justify-center " . $classes;
    }
@endphp

@if($attributes->get('href'))
<a {{ $attributes->merge(['type' => 'submit', 'class' => 'block ' . $classes]) }}>
    {{ $slot }}
</a>
@else
<button {{ $attributes->merge(['type' => 'submit', 'class' => $classes]) }}>
    {{ $slot }}
</button>
@endif
