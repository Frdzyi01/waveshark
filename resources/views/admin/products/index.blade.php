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
                            <a href="{{ route('admin.categories', $destination->slug) }}" class="text-gray-500 hover:text-blue-600 transition-colors">{{ $destination->name }}</a>
                        </div>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <svg class="w-3 h-3 text-gray-400 mx-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                            <span class="text-gray-800 font-medium">{{ $category->name }}</span>
                        </div>
                    </li>
                </ol>
            </nav>
            <div class="flex items-center justify-between">
                <div>
                    <h2 class="font-bold text-2xl text-gray-900 leading-tight tracking-tight">
                        {{ $category->name }}
                    </h2>
                    <p class="text-sm text-gray-500 mt-1">{{ $destination->name }} — Manage products in this category.</p>
                </div>
                <a href="{{ route('admin.products.create', [$destination->slug, $category->slug]) }}"
                    style="background:#fff;color:#2563eb;border:1px solid #2563eb;padding:10px 16px;border-radius:8px;text-decoration:none;display:inline-flex;align-items:center;gap:8px;"
                    onmouseover="this.style.background='#2563eb';this.style.color='#fff';this.style.borderColor='#fff';"
                    onmouseout="this.style.background='#fff';this.style.color='#2563eb';this.style.borderColor='#2563eb';">
                    + Add Product
                </a>
               
            </div>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            @if ($message = Session::get('success'))
            <div class="p-4 text-green-700 bg-green-100 rounded-lg">
                {{ $message }}
            </div>
            @endif

            {{-- Statistics --}}
            <style>
                .product-stats-container {
                    display: flex;
                    flex-direction: column;
                    gap: 1rem;
                    width: 100%;
                }

                @media (min-width: 768px) {
                    .product-stats-container {
                        flex-direction: row;
                    }
                }

                .product-stats-card {
                    flex: 1;
                    min-width: 0;
                }
            </style>
            <div class="product-stats-container">
                <div class="product-stats-card bg-white p-5 rounded-xl shadow-sm border-l-4 border-blue-500">
                    <div class="flex justify-between items-center mb-2">
                        <div class="p-2 bg-blue-50 rounded-lg">
                            <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m0-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                            </svg>
                        </div>
                        <span class="text-xs font-semibold text-blue-600 bg-blue-50 px-2 py-1 rounded-full">Total</span>
                    </div>
                    <span class="block text-2xl font-bold text-gray-800">{{ $totalProducts }}</span>
                    <span class="text-sm text-gray-500">Total Products</span>
                </div>

                <div class="product-stats-card bg-white p-5 rounded-xl shadow-sm border-l-4 border-green-500">
                    <div class="flex justify-between items-center mb-2">
                        <div class="p-2 bg-green-50 rounded-lg">
                            <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                        </div>
                        <span class="text-xs font-semibold text-green-600 bg-green-50 px-2 py-1 rounded-full">Active</span>
                    </div>
                    <span class="block text-2xl font-bold text-gray-800">{{ $availableCount }}</span>
                    <span class="text-sm text-gray-500">Available</span>
                </div>

                <div class="product-stats-card bg-white p-5 rounded-xl shadow-sm border-l-4 border-red-500">
                    <div class="flex justify-between items-center mb-2">
                        <div class="p-2 bg-red-50 rounded-lg">
                            <svg class="w-5 h-5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </div>
                        <span class="text-xs font-semibold text-red-600 bg-red-50 px-2 py-1 rounded-full">Inactive</span>
                    </div>
                    <span class="block text-2xl font-bold text-gray-800">{{ $unavailableCount }}</span>
                    <span class="text-sm text-gray-500">Unavailable</span>
                </div>
            </div>

            {{-- Search & Filter --}}
            <div class="bg-white rounded-xl shadow-sm p-6">
                <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                    {{-- Search --}}
                    <form method="GET" action="{{ route('admin.products.index', [$destination->slug, $category->slug]) }}" class="flex-1 max-w-md">
                        <div class="relative">
                            <svg class="absolute left-3 top-1/2 transform -translate-y-1/2 w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                            <input type="text" name="search" value="{{ request('search') }}" placeholder="Search product..." class="w-full pl-10 pr-4 py-2.5 text-sm bg-gray-50 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500">
                            @if(request('status'))
                            <input type="hidden" name="status" value="{{ request('status') }}">
                            @endif
                        </div>
                    </form>

                    {{-- Filter Tabs --}}
                    <div class="flex items-center gap-2">
                        <a href="{{ route('admin.products.index', [$destination->slug, $category->slug, 'search' => request('search')]) }}"
                            class="px-4 py-2 text-sm font-medium rounded-lg transition-colors {{ !request('status') ? 'bg-blue-600 text-white' : 'bg-gray-100 text-gray-600 hover:bg-gray-200' }}">
                            All
                        </a>
                        <a href="{{ route('admin.products.index', [$destination->slug, $category->slug, 'status' => 'available', 'search' => request('search')]) }}"
                            class="px-4 py-2 text-sm font-medium rounded-lg transition-colors {{ request('status') === 'available' ? 'bg-green-600 text-white' : 'bg-gray-100 text-gray-600 hover:bg-gray-200' }}">
                            Available
                        </a>
                        <a href="{{ route('admin.products.index', [$destination->slug, $category->slug, 'status' => 'unavailable', 'search' => request('search')]) }}"
                            class="px-4 py-2 text-sm font-medium rounded-lg transition-colors {{ request('status') === 'unavailable' ? 'bg-red-600 text-white' : 'bg-gray-100 text-gray-600 hover:bg-gray-200' }}">
                            Unavailable
                        </a>
                    </div>
                </div>
            </div>

            {{-- Products Table --}}
            <div class="bg-white rounded-xl shadow-sm overflow-hidden">
                <div class="relative overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-4">Image</th>
                                <th scope="col" class="px-6 py-4">Product Name</th>
                                <th scope="col" class="px-6 py-4">Price</th>
                                <th scope="col" class="px-6 py-4">Status</th>
                                <th scope="col" class="px-6 py-4">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($products as $product)
                            <tr class="bg-white border-b hover:bg-gray-50 transition-colors">
                                <td class="px-6 py-4">
                                    @if($product->image)
                                    <img src="{{ $product->image }}" alt="{{ $product->title }}" class="w-16 h-16 object-cover rounded-lg">
                                    @else
                                    <div class="w-16 h-16 bg-gray-100 rounded-lg flex items-center justify-center">
                                        <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                        </svg>
                                    </div>
                                    @endif
                                </td>
                                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                    {{ $product->title }}
                                </td>
                                <td class="px-6 py-4 font-medium">
                                    {{ $product->price }}
                                </td>
                                <td class="px-6 py-4">
                                    <span class="{{ $product->status === 'available' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }} text-xs font-medium px-2.5 py-1 rounded-full">
                                        {{ ucfirst(str_replace('_', ' ', $product->status)) }}
                                    </span>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center space-x-3">
                                        <a href="{{ route('admin.products.edit', [$destination->slug, $category->slug, $product->id]) }}" class="font-medium text-blue-600 hover:text-blue-800 transition-colors">Edit</a>
                                        <form action="{{ route('admin.products.destroy', [$destination->slug, $category->slug, $product->id]) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this product?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="font-medium text-red-600 hover:text-red-800 transition-colors">Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="px-6 py-12 text-center">
                                    <div class="flex flex-col items-center">
                                        <svg class="w-12 h-12 text-gray-300 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 7l-8-4-8 4m16 0l-8 4m0-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                                        </svg>
                                        <p class="text-gray-500 text-sm">No products found.</p>
                                        <a href="{{ route('admin.products.create', [$destination->slug, $category->slug]) }}" class="mt-3 text-sm text-blue-600 hover:text-blue-700 font-medium">+ Add your first product</a>
                                    </div>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                {{-- Pagination --}}
                @if($products->hasPages())
                <div class="px-6 py-4 border-t border-gray-200">
                    {{ $products->links() }}
                </div>
                @endif
            </div>

        </div>
    </div>
</x-app-layout>