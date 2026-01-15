<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Elegant Admin Dashboard</title>
    @vite(['resources/css/admin.css', 'resources/js/admin.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />

</head>

<body class="bg-gradient-to-br from-gray-50 to-gray-100 min-h-screen pb-16" x-data="{ sidebarOpen: false }">
    <!-- Sidebar -->
    <x-admin.sidebar></x-admin.sidebar>

    <!-- Overlay -->
    <div x-show="sidebarOpen" @click="sidebarOpen = false"
        x-transition:enter="transition-opacity ease-linear duration-300" x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100" x-transition:leave="transition-opacity ease-linear duration-300"
        x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
        class="fixed inset-0 bg-black/50 z-40 md:hidden" style="display: none;"></div>

    <!-- Top Navigation Bar -->
    <div id="topbar"
        class="fixed top-0 left-0 md:left-64 right-0 h-18 glass-effect shadow-lg z-40 transition-all duration-300">
        <div class="flex items-center justify-between h-full px-4 md:px-8">
            <button id="toggleSidebar" @click="sidebarOpen = !sidebarOpen"
                class="text-2xl text-ceramic-blue hover:text-gold-accent transition-colors duration-300 md:hidden">
                <i class="fas fa-bars"></i>
            </button>

            <!-- Spacer for desktop when no hamburger is shown -->
            <div class="hidden md:block"></div>

            <div class="flex items-center gap-6">
                <!-- User Menu -->
                <div class="relative" x-data="{ dropdownOpen: false }">
                    <button @click="dropdownOpen = !dropdownOpen" @click.outside="dropdownOpen = false"
                        class="flex items-center gap-3 cursor-pointer px-4 py-2 rounded-xl hover:bg-gray-100 transition-all duration-300 focus:outline-none">
                        <div
                            class="w-10 h-10 rounded-full gradient-gold flex items-center justify-center text-white font-semibold">
                            {{ Auth::user()->name[0] }}
                        </div>
                        <div class="user-details hidden md:block text-left">
                            <div class="text-sm font-semibold text-premium-dark">
                                {{ Auth::user()->name }}
                            </div>
                            <div class="text-xs text-gray-500">
                                Administrator
                            </div>
                        </div>
                        <i class="fas fa-chevron-down text-sm text-gray-400 transition-transform duration-300"
                            :class="{ 'rotate-180': dropdownOpen }"></i>
                    </button>

                    <!-- Dropdown -->
                    <div x-show="dropdownOpen" x-transition:enter="transition ease-out duration-200"
                        x-transition:enter-start="opacity-0 translate-y-2"
                        x-transition:enter-end="opacity-100 translate-y-0"
                        x-transition:leave="transition ease-in duration-150"
                        x-transition:leave-start="opacity-100 translate-y-0"
                        x-transition:leave-end="opacity-0 translate-y-2"
                        class="absolute right-0 mt-2 w-56 bg-white rounded-2xl shadow-2xl overflow-hidden z-50"
                        style="display: none;">
                        <a href="#"
                            class="flex items-center gap-3 px-4 py-3 hover:bg-gray-50 transition-colors duration-200">
                            <i class="fas fa-user w-5 text-gray-400"></i>
                            <span class="text-sm font-medium text-gray-700">My Profile</span>
                        </a>
                        <a href="#"
                            class="flex items-center gap-3 px-4 py-3 hover:bg-gray-50 transition-colors duration-200">
                            <i class="fas fa-cog w-5 text-gray-400"></i>
                            <span class="text-sm font-medium text-gray-700">Account Settings</span>
                        </a>
                        <hr class="my-2 border-gray-100" />
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit"
                                class="flex items-center gap-3 px-4 py-3 hover:bg-gray-50 transition-colors duration-200">
                                <i class="fas fa-sign-out-alt w-5 text-gray-400"></i>
                                <span class="text-sm font-medium text-gray-700">Logout</span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div id="mainContent" class="ml-0 md:ml-64 mt-18 p-4 md:p-8 transition-all duration-300 min-h-screen">
        {{ $slot }}
    </div>


</body>

<footer>
    <div class="fixed bottom-0 left-0 right-0 h-16 bg-white border-t border-gray-200">
        <div class="flex items-center justify-center h-full">
            <p class="text-sm text-gray-500">© 2026 Rapa Cast Stone. All rights reserved.</p>
        </div>
    </div>
</footer>

</html>
