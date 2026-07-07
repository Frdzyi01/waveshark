<x-app-layout>
    <x-slot name="header">
        <div>
            {{-- Breadcrumb --}}
            <nav class="flex mb-3" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-3 text-sm">
                    <li class="inline-flex items-center">
                        <a href="{{ route('dashboard') }}" class="text-gray-500 hover:text-blue-600 transition-colors">Dashboard</a>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <svg class="w-3 h-3 text-gray-400 mx-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                            <span class="text-gray-800 font-medium">{{ $destination->name }}</span>
                        </div>
                    </li>
                </ol>
            </nav>
            <h2 class="font-bold text-2xl text-gray-900 leading-tight tracking-tight">
                {{ $destination->name }} Categories
            </h2>
            <p class="text-sm text-gray-500 mt-1">Select a category to manage its products.</p>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if ($message = Session::get('success'))
            <div class="mb-6 p-4 text-green-700 bg-green-100 rounded-lg">
                {{ $message }}
            </div>
            @endif

            {{-- Category Grid --}}
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($categories as $category)
                <a href="{{ route('admin.products.index', [$destination->slug, $category->slug]) }}" class="group block bg-white border border-gray-200 rounded-xl p-6 hover:border-blue-300 hover:shadow-lg transition-all duration-200">
                    <div class="flex items-start justify-between mb-4">
                        <div class="flex-shrink-0 p-3 bg-blue-50 rounded-lg group-hover:bg-blue-100 transition-colors">
                            <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                            </svg>
                        </div>
                        <span class="text-xs font-semibold text-blue-600 bg-blue-50 px-2.5 py-1 rounded-full">
                            {{ $category->products_count }} {{ Str::plural('Product', $category->products_count) }}
                        </span>
                    </div>

                    <h3 class="text-lg font-semibold text-gray-900 mb-2">{{ $category->name }}</h3>

                    <div class="flex items-center gap-4 text-xs text-gray-500 mb-4">
                        <span class="flex items-center gap-1">
                            <span class="w-2 h-2 rounded-full bg-green-400"></span>
                            {{ $category->available_count }} Available
                        </span>
                        <span class="flex items-center gap-1">
                            <span class="w-2 h-2 rounded-full bg-red-400"></span>
                            {{ $category->unavailable_count }} Unavailable
                        </span>
                    </div>

                    <span class="text-xs font-medium text-blue-600 group-hover:text-blue-700 flex items-center gap-1">
                        Manage Products
                        <svg class="w-3 h-3 group-hover:translate-x-0.5 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </span>
                </a>
                @endforeach
            </div>

        </div>
    </div>
</x-app-layout>
