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

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">

            <!-- Statistics Row -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Total Products -->
                <div class="bg-white p-6 rounded-lg border border-gray-200 shadow-sm flex flex-col justify-between h-32">
                    <div class="flex justify-between items-start">
                        <span class="text-sm font-medium text-gray-500">Total Products</span>
                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 7l-8-4-8 4m16 0l-8 4m0-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                        </svg>
                    </div>
                    <div>
                        <span class="text-3xl font-bold text-gray-900 block" style="line-height:1;">{{ $productCount }}</span>
                    </div>
                </div>

                <!-- Active Bookings (Mock) -->
                <div class="bg-white p-6 rounded-lg border border-gray-200 shadow-sm flex flex-col justify-between h-32">
                    <div class="flex justify-between items-start">
                        <span class="text-sm font-medium text-gray-500">Active Bookings</span>
                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <div>
                        <span class="text-3xl font-bold text-gray-900 block mb-1" style="line-height:1;">12</span>
                        <span class="text-xs font-medium text-green-600 flex items-center gap-1">
                            <svg class="w-3 h-3" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                            </svg>
                            +2 today
                        </span>
                    </div>
                </div>

                <!-- Revenue (Mock) -->
                <div class="bg-white p-6 rounded-lg border border-gray-200 shadow-sm flex flex-col justify-between h-32">
                    <div class="flex justify-between items-start">
                        <span class="text-sm font-medium text-gray-500">Total Revenue</span>
                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div>
                        <span class="text-3xl font-bold text-gray-900 block mb-1" style="line-height:1;">RM 4,250</span>
                        <span class="text-xs font-medium text-gray-400">Current month</span>
                    </div>
                </div>
            </div>

            <!-- Management Section -->
            <div>
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Management</h3>
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
                </div>
            </div>

        </div>
    </div>
</x-app-layout>