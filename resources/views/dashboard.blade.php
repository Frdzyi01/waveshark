<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="font-bold text-2xl text-gray-900 leading-tight tracking-tight">
                    {{ __('Dashboard') }}
                </h2>
                <p class="text-sm text-gray-500 mt-1">Overview of your business performance.</p>
            </div>
            <div class="text-sm text-gray-500">
                {{ now()->format('l, d M Y') }}
            </div>
        </div>
    </x-slot>

    <div class="py-8 mt-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">

            <!-- Statistics Row -->
            <style>
                .stats-container {
                    display: flex;
                    flex-direction: column;
                    /* Stack vertically on mobile */
                    gap: 1.5rem;
                    width: 100%;
                }

                @media (min-width: 768px) {
                    .stats-container {
                        flex-direction: row;
                        /* Side-by-side on desktop */
                    }
                }

                .stats-card {
                    flex: 1;
                    min-width: 0;
                }
            </style>

            <div class="stats-container">
                <!-- Total Products -->
                <div class="stats-card bg-white p-6 rounded-xl shadow-lg border-l-4 border-blue-500 hover:shadow-xl transition-shadow duration-300">
                    <div class="flex justify-between items-center mb-4">
                        <div class="p-3 bg-blue-100 rounded-lg">
                            <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m0-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                            </svg>
                        </div>
                        <span class="text-xs font-semibold text-blue-600 bg-blue-100 px-2 py-1 rounded-full">Products</span>
                    </div>
                    <div>
                        <span class="block text-2xl font-bold text-gray-800">{{ $productCount }}</span>
                        <span class="text-sm text-gray-500">Total Products available</span>
                    </div>
                </div>

                <!-- Active Bookings -->
                <div class="stats-card bg-white p-6 rounded-xl shadow-lg border-l-4 border-green-500 hover:shadow-xl transition-shadow duration-300">
                    <div class="flex justify-between items-center mb-4">
                        <div class="p-3 bg-green-100 rounded-lg">
                            <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <span class="text-xs font-semibold text-green-600 bg-green-100 px-2 py-1 rounded-full">+2 Today</span>
                    </div>
                    <div>
                        <span class="block text-2xl font-bold text-gray-800">12</span>
                        <span class="text-sm text-gray-500">Active Bookings in progress</span>
                    </div>
                </div>

                <!-- Total Revenue -->
                <div class="stats-card bg-white p-6 rounded-xl shadow-lg border-l-4 border-purple-500 hover:shadow-xl transition-shadow duration-300">
                    <div class="flex justify-between items-center mb-4">
                        <div class="p-3 bg-purple-100 rounded-lg">
                            <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <span class="text-xs font-semibold text-purple-600 bg-purple-100 px-2 py-1 rounded-full">This Month</span>
                    </div>
                    <div>
                        <span class="block text-2xl font-bold text-gray-800">RM 4,250</span>
                        <span class="text-sm text-gray-500">Total Revenue generated</span>
                    </div>
                </div>
            </div>

            <!-- Management Section -->
            <div>
                <h3 class="text-lg font-semibold text-gray-900 mb-4 mt-8">Management</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <!-- Product Management Card -->
                    <a href="{{ route('langkawi-products.index') }}" class="group block bg-white border border-gray-200 rounded-lg p-5 hover:border-gray-300 hover:shadow-md transition-all duration-200">
                        <div class="flex items-start gap-4">
                            <div class="flex-shrink-0 p-2 bg-gray-50 rounded-md group-hover:bg-gray-100 transition-colors">
                                <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                                </svg>
                            </div>
                            <div>
                                <h4 class="text-base font-semibold text-gray-900 mb-1">Langkawi Products</h4>
                                <p class="text-sm text-gray-500 mb-3">Manage fleet, tours, and pricing.</p>
                                <span class="text-xs font-medium text-blue-600 group-hover:text-blue-700 flex items-center gap-1">
                                    Manage Inventory
                                    <svg class="w-3 h-3 group-hover:translate-x-0.5 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                    </svg>
                                </span>
                            </div>
                        </div>
                    </a>

                    <!-- Sabah Product Management Card -->
                    <a href="{{ route('sabah-products.index') }}" class="group block bg-white border border-gray-200 rounded-lg p-5 hover:border-gray-300 hover:shadow-md transition-all duration-200">
                        <div class="flex items-start gap-4">
                            <div class="flex-shrink-0 p-2 bg-gray-50 rounded-md group-hover:bg-gray-100 transition-colors">
                                <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3.75 3v11.25A2.25 2.25 0 0 0 6 16.5h2.25M3.75 3h-1.5m1.5 0h16.5m0 0h1.5m-1.5 0v11.25A2.25 2.25 0 0 1 18 16.5h-2.25m-7.5 0h7.5m-7.5 0-1 3m8.5-3 1 3m0 0 .5 1.5m-.5-1.5h-9.5m0 0-.5 1.5M9 11.25v1.5M12 9v3.75m3-6v6"></path>
                                </svg>
                            </div>
                            <div>
                                <h4 class="text-base font-semibold text-gray-900 mb-1">Sabah Products</h4>
                                <p class="text-sm text-gray-500 mb-3">Manage tours and activities for Sabah.</p>
                                <span class="text-xs font-medium text-blue-600 group-hover:text-blue-700 flex items-center gap-1">
                                    Manage Inventory
                                    <svg class="w-3 h-3 group-hover:translate-x-0.5 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                    </svg>
                                </span>
                            </div>
                        </div>
                    </a>

                    <!-- St John Product Management Card -->
                    <a href="{{ route('stjohn-products.index') }}" class="group block bg-white border border-gray-200 rounded-lg p-5 hover:border-gray-300 hover:shadow-md transition-all duration-200">
                        <div class="flex items-start gap-4">
                            <div class="flex-shrink-0 p-2 bg-gray-50 rounded-md group-hover:bg-gray-100 transition-colors">
                                <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3.75 3v11.25A2.25 2.25 0 0 0 6 16.5h2.25M3.75 3h-1.5m1.5 0h16.5m0 0h1.5m-1.5 0v11.25A2.25 2.25 0 0 1 18 16.5h-2.25m-7.5 0h7.5m-7.5 0-1 3m8.5-3 1 3m0 0 .5 1.5m-.5-1.5h-9.5m0 0-.5 1.5M9 11.25v1.5M12 9v3.75m3-6v6"></path>
                                </svg>
                            </div>
                            <div>
                                <h4 class="text-base font-semibold text-gray-900 mb-1">St John Products</h4>
                                <p class="text-sm text-gray-500 mb-3">Manage tours and activities for St John.</p>
                                <span class="text-xs font-medium text-blue-600 group-hover:text-blue-700 flex items-center gap-1">
                                    Manage Inventory
                                    <svg class="w-3 h-3 group-hover:translate-x-0.5 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                    </svg>
                                </span>
                            </div>
                        </div>
                    </a>

                    <!-- Landing Page Services Management Card -->
                    <a href="{{ route('landing-services.index') }}" class="group block bg-white border border-gray-200 rounded-lg p-5 hover:border-gray-300 hover:shadow-md transition-all duration-200">
                        <div class="flex items-start gap-4">
                            <div class="flex-shrink-0 p-2 bg-gray-50 rounded-md group-hover:bg-gray-100 transition-colors">
                                <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                            <div>
                                <h4 class="text-base font-semibold text-gray-900 mb-1">Landing Page Services</h4>
                                <p class="text-sm text-gray-500 mb-3">Manage images and text for landing page services.</p>
                                <span class="text-xs font-medium text-blue-600 group-hover:text-blue-700 flex items-center gap-1">
                                    Manage Content
                                    <svg class="w-3 h-3 group-hover:translate-x-0.5 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                    </svg>
                                </span>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>