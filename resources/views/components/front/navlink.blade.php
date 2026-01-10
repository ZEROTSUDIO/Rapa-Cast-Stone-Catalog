@props(['active' => false])
<a {{ $attributes }}
    class="nav-link-hover text-[#3A352F] text-xs font-normal tracking-[1.5px] uppercase hover:text-[#B5A693] transition-colors duration-400 {{ $active ? 'text-[#B5A693]' : '' }}"
    aria-current="{{ $active ? 'page' : false }}">
    {{ $slot }}
</a>
