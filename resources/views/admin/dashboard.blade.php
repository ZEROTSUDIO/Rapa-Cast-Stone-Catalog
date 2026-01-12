<x-admin.layout>
    <div id="dashboard" class="page active animate-slide-in">
        <div class="mb-8">
            <h1 class="text-4xl font-bold text-premium-dark mb-2">
                Dashboard Overview
            </h1>
            <p class="text-gray-500">
                Welcome to your elegant admin dashboard
            </p>
        </div>

        <!-- Stats Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <div class="bg-white rounded-2xl p-6 shadow-lg hover-lift border-l-4 border-purple-500">
                <div
                    class="w-14 h-14 rounded-xl gradient-purple flex items-center justify-center text-white text-2xl mb-4">
                    <i class="fas fa-users"></i>
                </div>
                <div class="text-3xl font-bold text-premium-dark mb-2">
                    2,543
                </div>
                <div class="text-sm text-gray-500 font-medium">
                    Total Users
                </div>
            </div>

            <div class="bg-white rounded-2xl p-6 shadow-lg hover-lift border-l-4 border-pink-500">
                <div
                    class="w-14 h-14 rounded-xl gradient-pink flex items-center justify-center text-white text-2xl mb-4">
                    <i class="fas fa-chart-line"></i>
                </div>
                <div class="text-3xl font-bold text-premium-dark mb-2">
                    $45.2K
                </div>
                <div class="text-sm text-gray-500 font-medium">
                    Revenue
                </div>
            </div>

            <div class="bg-white rounded-2xl p-6 shadow-lg hover-lift border-l-4 border-blue-500">
                <div
                    class="w-14 h-14 rounded-xl gradient-blue flex items-center justify-center text-white text-2xl mb-4">
                    <i class="fas fa-shopping-cart"></i>
                </div>
                <div class="text-3xl font-bold text-premium-dark mb-2">
                    1,832
                </div>
                <div class="text-sm text-gray-500 font-medium">
                    Orders
                </div>
            </div>

            <div class="bg-white rounded-2xl p-6 shadow-lg hover-lift border-l-4 border-green-500">
                <div
                    class="w-14 h-14 rounded-xl gradient-green flex items-center justify-center text-white text-2xl mb-4">
                    <i class="fas fa-star"></i>
                </div>
                <div class="text-3xl font-bold text-premium-dark mb-2">
                    4.8
                </div>
                <div class="text-sm text-gray-500 font-medium">
                    Rating
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Recent Activity -->
            <div class="lg:col-span-2 bg-white rounded-2xl shadow-lg overflow-hidden">
                <div class="bg-gradient-to-r from-gray-50 to-gray-100 px-6 py-4 border-b border-gray-200">
                    <h2 class="text-lg font-bold text-premium-dark">
                        Recent Activity
                    </h2>
                </div>
                <div class="p-6 space-y-4">
                    <div class="flex items-center gap-4 pb-4 border-b border-gray-100">
                        <div class="w-12 h-12 rounded-xl gradient-purple flex items-center justify-center text-white">
                            <i class="fas fa-user-plus"></i>
                        </div>
                        <div class="flex-1">
                            <h6 class="font-semibold text-gray-800 mb-1">
                                New user registered
                            </h6>
                            <small class="text-gray-400">2 minutes ago</small>
                        </div>
                    </div>
                    <div class="flex items-center gap-4 pb-4 border-b border-gray-100">
                        <div class="w-12 h-12 rounded-xl gradient-pink flex items-center justify-center text-white">
                            <i class="fas fa-money-bill-wave"></i>
                        </div>
                        <div class="flex-1">
                            <h6 class="font-semibold text-gray-800 mb-1">
                                Payment received
                            </h6>
                            <small class="text-gray-400">15 minutes ago</small>
                        </div>
                    </div>
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 rounded-xl gradient-blue flex items-center justify-center text-white">
                            <i class="fas fa-box"></i>
                        </div>
                        <div class="flex-1">
                            <h6 class="font-semibold text-gray-800 mb-1">
                                New order placed
                            </h6>
                            <small class="text-gray-400">1 hour ago</small>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
                <div class="bg-gradient-to-r from-gray-50 to-gray-100 px-6 py-4 border-b border-gray-200">
                    <h2 class="text-lg font-bold text-premium-dark">
                        Quick Actions
                    </h2>
                </div>
                <div class="p-6 space-y-3">
                    <button
                        class="w-full gradient-gold text-white px-6 py-3 rounded-xl font-semibold shadow-lg hover:shadow-xl transition-all duration-300 hover:scale-105">
                        <i class="fas fa-plus-circle mr-2"></i>Create
                        New
                    </button>
                    <button
                        class="w-full bg-white border-2 border-gray-200 text-ceramic-blue px-6 py-3 rounded-xl font-semibold hover:bg-gray-50 transition-all duration-300">
                        <i class="fas fa-file-alt mr-2"></i>View Reports
                    </button>
                    <button
                        class="w-full bg-white border-2 border-gray-200 text-ceramic-blue px-6 py-3 rounded-xl font-semibold hover:bg-gray-50 transition-all duration-300">
                        <i class="fas fa-cog mr-2"></i>Settings
                    </button>
                </div>
            </div>
        </div>
    </div>
</x-admin.layout>
