<nav class="navbar navbar-expand-lg fixed-top">
    <div class="container">
        <a class="navbar-brand" href="/">RAPA CAST STONE</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                <x-front.navlink href="/" :active="request()->is('/')">Home</x-front.navlink>
                <x-front.navlink href="/about" :active="request()->is('about')">About</x-front.navlink>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle {{ request()->is('catalogs') ? 'active' : '' }}" href="#"
                        role="button" data-bs-toggle="dropdown">
                        Catalogue
                    </a>

                    <ul class="dropdown-menu">
                        {{-- All --}}
                        <li>
                            <a class="dropdown-item {{ request()->missing('category') ? 'active' : '' }}"
                                href="/catalogs">
                                All Catalogue
                            </a>
                        </li>

                        {{-- Categories --}}
                        @foreach ($categories as $category)
                            <li>
                                <a class="dropdown-item {{ request('category') === $category->slug ? 'active' : '' }}"
                                    href="/catalogs?category={{ $category->slug }}">
                                    {{ $category->name }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </li>

                <x-front.navlink href="/articles" :active="request()->is('articles*')">Articles</x-front.navlink>
                <x-front.navlink href="/contact" :active="request()->is('contact')">Contact</x-front.navlink>
            </ul>
            <form action="/catalogs" class="navbar-search" role="search">
                <input type="search" name="search" class="search-input" placeholder="Search..." aria-label="Search"
                    required>
                <button type="submit" class="search-btn" aria-label="Search">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                        <circle cx="11" cy="11" r="7" />
                        <line x1="16" y1="16" x2="22" y2="22" stroke="currentColor"
                            stroke-width="2" />
                    </svg>
                </button>
            </form>
        </div>
    </div>
</nav>
