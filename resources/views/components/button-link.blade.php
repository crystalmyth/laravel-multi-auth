@php
    $classes = 'border inline-block px-3 py-2 mb-3 bg-white rounded shadow-sm sm:rounded-lg cursor-pointer';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
