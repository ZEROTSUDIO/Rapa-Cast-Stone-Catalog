@props(['active' => false])
<a {{ $attributes }}
    class="nav-link flex items-center gap-3 px-4 py-3 rounded-xl text-white/70 hover:bg-gold-accent/20 hover:text-white transition-all duration-300 group"
    aria-current="{{ $active ? 'page' : false }}">
    {{ $slot }}
</a>
