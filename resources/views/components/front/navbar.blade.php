<nav class="fixed top-0 left-0 right-0 z-50 bg-[#FDFBF7]/85 backdrop-blur-xl border-b border-[#B5A693]/20 shadow-sm"
    x-data="{ mobileOpen: false }">
    <div class="max-w-7xl mx-auto px-6 py-6">
        <div class="flex items-center justify-between">
            <!-- Brand -->
            <a href="{{ url('/') }}" class="flex items-center hover:opacity-80 transition-opacity duration-400">
                <img src="{{ asset('img/logo.png') }}" alt="Rapa Cast Stone" class="h-12 w-auto">
            </a>

            <!-- Desktop Menu -->
            <div class="hidden md:flex items-center space-x-12">
                <x-front.navlink href="{{ url('/') }}" :active="request()->is('/')">Home</x-front.navlink>
                <x-front.navlink href="{{ url('/about') }}" :active="request()->is('about')">About</x-front.navlink>

                <!-- Dropdown for Catalogue -->
                <div class="relative group" x-data="{ open: false }" @mouseenter="open = true"
                    @mouseleave="open = false">
                    <button
                        class="nav-link-hover text-[#3A352F] text-xs font-normal tracking-[1.5px] uppercase hover:text-[#B5A693] transition-colors duration-400 flex items-center gap-1">
                        Catalogue
                        <svg class="w-3 h-3 transition-transform duration-300" :class="{ 'rotate-180': open }"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg>
                    </button>
                    <div
                        class="absolute left-0 mt-2 w-48 bg-[#FDFBF7] shadow-lg border border-[#B5A693]/20 py-2 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 transform origin-top z-50">
                        <a href="{{ url('/catalogs') }}"
                            class="block px-4 py-2 text-xs uppercase tracking-wider text-[#6B5E52] hover:bg-[#F5F1E8] hover:text-[#B5A693]">
                            All Catalogue
                        </a>
                        @foreach ($categories as $category)
                            <a href="{{ url('/catalogs?category=' . $category->slug) }}"
                                class="block px-4 py-2 text-xs uppercase tracking-wider text-[#6B5E52] hover:bg-[#F5F1E8] hover:text-[#B5A693]">
                                {{ $category->name }}
                            </a>
                        @endforeach
                    </div>
                </div>

                <x-front.navlink href="{{ url('/articles') }}" :active="request()->is('articles*')">Articles</x-front.navlink>
                <x-front.navlink href="{{ url('/contact') }}" :active="request()->is('contact')">Contact</x-front.navlink>
            </div>

            <!-- Right Actions (Search + Mobile Toggle) -->
            <div class="flex items-center space-x-4">
                <!-- Search -->
                <form action="{{ url('/catalogs') }}" class="hidden lg:flex items-center">
                    <input type="text" name="search" placeholder="Search..."
                        class="bg-transparent border-b border-[#B5A693] px-0 py-2 text-[#3A352F] text-sm focus:border-[#3A352F] focus:outline-none transition-all duration-400 w-32 focus:w-48 placeholder-[#B5A693]">
                    <button class="ml-2 text-[#3A352F] hover:text-[#B5A693] transition-colors duration-400">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </button>
                </form>

                <!-- Mobile Menu Button -->
                <button @click="mobileOpen = !mobileOpen" class="md:hidden text-[#6B5E52] focus:outline-none">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div x-show="mobileOpen" x-transition class="md:hidden mt-6 pb-4 space-y-4 border-t border-[#B5A693]/20 pt-4"
            style="display: none;">

            <a href="{{ url('/') }}"
                class="block text-[#6B5E52] text-sm tracking-wider uppercase hover:text-[#B5A693]">Home</a>
            <a href="{{ url('/about') }}"
                class="block text-[#6B5E52] text-sm tracking-wider uppercase hover:text-[#B5A693]">About</a>

            <div x-data="{ catOpen: false }">
                <button @click="catOpen = !catOpen"
                    class="flex justify-between items-center w-full text-[#6B5E52] text-sm tracking-wider uppercase hover:text-[#B5A693]">
                    <span>Catalogue</span>
                    <svg class="w-3 h-3 transition-transform" :class="{ 'rotate-180': catOpen }" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>
                <div x-show="catOpen" class="pl-4 mt-2 space-y-2 border-l border-[#B5A693]/20 ml-1">
                    <a href="{{ url('/catalogs') }}"
                        class="block text-[#6B5E52] text-xs uppercase tracking-wider hover:text-[#B5A693]">All</a>
                    @foreach ($categories as $category)
                        <a href="{{ url('/catalogs?category=' . $category->slug) }}"
                            class="block text-[#6B5E52] text-xs uppercase tracking-wider hover:text-[#B5A693]">
                            {{ $category->name }}
                        </a>
                    @endforeach
                </div>
            </div>

            <a href="{{ url('/articles') }}"
                class="block text-[#6B5E52] text-sm tracking-wider uppercase hover:text-[#B5A693]">Journal</a>
            <a href="{{ url('/contact') }}"
                class="block text-[#6B5E52] text-sm tracking-wider uppercase hover:text-[#B5A693]">Contact</a>
        </div>
    </div>
</nav>
