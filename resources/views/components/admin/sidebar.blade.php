<div id="sidebar" :class="{ 'translate-x-0': sidebarOpen, '-translate-x-full': !sidebarOpen }"
    class="fixed top-0 left-0 h-screen w-64 bg-gradient-to-b from-premium-dark to-ceramic-blue shadow-2xl z-50 transition-transform duration-300 overflow-y-auto transform -translate-x-full md:translate-x-0">
    <div class="p-6">
        <!-- Logo -->
        <div class="flex items-center gap-3 mb-10 pb-6 border-b border-gold-accent/30">
            <i class="fas fa-gem text-gold-accent text-2xl"></i>
            <span class="text-white text-2xl font-bold sidebar-text">ELEGANT</span>
        </div>

        <!-- Navigation -->
        <nav class="space-y-2">
            <x-admin.navlink href="{{ url('admin') }}" active="{{ request()->routeIs('admin') }}">
                <i class="fas fa-tachometer-alt w-5"></i>
                <span class="sidebar-text">Dashboard</span>
            </x-admin.navlink>
            {{-- <a href="#"
                class="nav-link flex items-center gap-3 px-4 py-3 rounded-xl text-white/70 hover:bg-gold-accent/20 hover:text-white transition-all duration-300 group"
                data-page="table">
                <i class="fas fa-table w-5"></i>
                <span class="sidebar-text">Data Table</span>
            </a> --}}
            <x-admin.navlink href="{{ url('admin/catalogues') }}" active="{{ request()->routeIs('admin.catalogues') }}">
                <i class="fas fa-table w-5"></i>
                <span class="sidebar-text">Catalogue</span>
            </x-admin.navlink>
            <x-admin.navlink href="{{ url('admin/categories') }}" active="{{ request()->routeIs('admin.categories') }}">
                <i class="fas fa-th w-5"></i>
                <span class="sidebar-text">Category</span>
            </x-admin.navlink>
            {{-- <a href="#"
                class="nav-link flex items-center gap-3 px-4 py-3 rounded-xl text-white/70 hover:bg-gold-accent/20 hover:text-white transition-all duration-300 group"
                data-page="simple-form">
                <i class="fas fa-file-alt w-5"></i>
                <span class="sidebar-text">Article</span>
            </a>
            <a href="#"
                class="nav-link flex items-center gap-3 px-4 py-3 rounded-xl text-white/70 hover:bg-gold-accent/20 hover:text-white transition-all duration-300 group"
                data-page="advanced-form">
                <i class="fas fa-file-code w-5"></i>
                <span class="sidebar-text">Topic</span>
            </a>
            <a href="#"
                class="nav-link flex items-center gap-3 px-4 py-3 rounded-xl text-white/70 hover:bg-gold-accent/20 hover:text-white transition-all duration-300 group"
                data-page="advanced-form">
                <i class="fas fa-file-code w-5"></i>
                <span class="sidebar-text">User</span>
            </a>
            <a href="#"
                class="nav-link flex items-center gap-3 px-4 py-3 rounded-xl text-white/70 hover:bg-gold-accent/20 hover:text-white transition-all duration-300 group"
                data-page="settings">
                <i class="fas fa-cog w-5"></i>
                <span class="sidebar-text">Settings</span>
            </a> --}}
        </nav>
    </div>
</div>
