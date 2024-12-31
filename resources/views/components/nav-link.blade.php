@props(['active'])

@php
$classes = ($active ?? false)
            ? 'nav-link px-lg-3 py-3 py-lg-4'
            : 'nav-link px-lg-3 py-3 py-lg-4 bg-light-100';
@endphp
<li class="nav-item">
<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
</li>
