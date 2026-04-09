@props(['active'])

@php
$classes = ($active ?? false)
            ? 'mobile-link border-bento-primary/35 bg-bento-primary/10 text-white'
            : 'mobile-link';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
