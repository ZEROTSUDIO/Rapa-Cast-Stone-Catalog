<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Elegant Admin Dashboard</title>
    @vite(['resources/css/admin.css', 'resources/js/admin.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />

</head>

<body class="bg-gradient-to-br from-gray-50 to-gray-100 min-h-screen">
    <!-- Sidebar -->
    <x-admin.sidebar></x-admin.sidebar>

    <!-- Top Navigation Bar -->
    <div id="topbar" class="fixed top-0 left-64 right-0 h-18 glass-effect shadow-lg z-40 transition-all duration-300">
        <div class="flex items-center justify-between h-full px-8">
            <button id="toggleSidebar"
                class="text-2xl text-ceramic-blue hover:text-gold-accent transition-colors duration-300">
                <i class="fas fa-bars"></i>
            </button>

            <div class="flex items-center gap-6">
                <!-- User Menu -->
                <div class="relative group">
                    <div
                        class="flex items-center gap-3 cursor-pointer px-4 py-2 rounded-xl hover:bg-gray-100 transition-all duration-300">
                        <div
                            class="w-10 h-10 rounded-full gradient-gold flex items-center justify-center text-white font-semibold">
                            {{ Auth::user()->name[0] }}
                        </div>
                        <div class="user-details">
                            <div class="text-sm font-semibold text-premium-dark">
                                {{ Auth::user()->name }}
                            </div>
                            <div class="text-xs text-gray-500">
                                Administrator
                            </div>
                        </div>
                        <i class="fas fa-chevron-down text-sm text-gray-400"></i>
                    </div>

                    <!-- Dropdown -->
                    <div
                        class="absolute right-0 mt-2 w-56 bg-white rounded-2xl shadow-2xl opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 overflow-hidden">
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
    <div id="mainContent" class="ml-64 mt-18 p-8 transition-all duration-300 min-h-screen">
        {{ $slot }}
    </div>


</body>

</html>
