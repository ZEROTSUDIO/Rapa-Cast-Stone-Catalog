@props(['active' => false])

@php
    // Define the classes for active and inactive states
    $classes =
        $active ?? false
            ? 'nav-link flex items-center gap-3 px-4 py-3 rounded-xl transition-all duration-300 group bg-gold-accent/20 text-gold-accent font-bold' // Active Styles
            : 'nav-link flex items-center gap-3 px-4 py-3 rounded-xl transition-all duration-300 group text-white/70 hover:bg-gold-accent/10 hover:text-white'; // Inactive Styles
@endphp

<a {{ $attributes->merge(['class' => $classes]) }} aria-current="{{ $active ? 'page' : 'false' }}">
    {{ $slot }}
</a>
