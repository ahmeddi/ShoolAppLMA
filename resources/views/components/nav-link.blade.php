@props(['active'])


@php
$classes = ($active ?? false)
            ? ' text-sm flex space-x-2 items-center px-4 py-2 text-teal-900 bg-teal-200 rounded-md dark:bg-gray-600 dark:text-gray-100 transition'
            : 'flex space-x-2 items-center px-4 py-2 text-gray-500  rounded-md dark:bg-gray-900 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 dark:hover:text-gray-200 hover:text-gray-700 transition';

@endphp


<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
