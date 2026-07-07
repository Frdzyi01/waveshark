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
                            <a href="{{ route('admin.products.index', [$destination->slug, $category->slug]) }}" class="text-gray-500 hover:text-blue-600 transition-colors">{{ $category->name }}</a>
                        </div>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <svg class="w-3 h-3 text-gray-400 mx-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                            <span class="text-gray-800 font-medium">Edit Product</span>
                        </div>
                    </li>
                </ol>
            </nav>
            <h2 class="font-bold text-2xl text-gray-900 leading-tight tracking-tight">
                Edit Product
            </h2>
            <p class="text-sm text-gray-500 mt-1">{{ $destination->name }} — {{ $category->name }}</p>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm rounded-xl">
                <div class="p-6 text-gray-900">

                    @if($errors->any())
                    <div class="mb-6 p-4 text-red-700 bg-red-100 rounded-lg">
                        <ul class="list-disc list-inside text-sm">
                            @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <form action="{{ route('admin.products.update', [$destination->slug, $category->slug, $product->id]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-5">
                            <label for="title" class="block mb-2 text-sm font-medium text-gray-900">Title</label>
                            <input type="text" id="title" name="title" value="{{ old('title', $product->title) }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                        </div>

                        <div class="mb-5">
                            <label for="price" class="block mb-2 text-sm font-medium text-gray-900">Price (e.g. RM 80)</label>
                            <input type="text" id="price" name="price" value="{{ old('price', $product->price) }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                        </div>

                        <div class="mb-5">
                            <label for="status" class="block mb-2 text-sm font-medium text-gray-900">Status</label>
                            <select id="status" name="status" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                <option value="available" {{ old('status', $product->status) === 'available' ? 'selected' : '' }}>Available / Ready</option>
                                <option value="sold_out" {{ old('status', $product->status) === 'sold_out' ? 'selected' : '' }}>Sold Out</option>
                            </select>
                        </div>

                        <div class="mb-5">
                            <label for="image" class="block mb-2 text-sm font-medium text-gray-900">Image (Leave blank to keep current)</label>
                            <input type="file" id="image" name="image" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none">
                            @if($product->image)
                            <div class="mt-3">
                                <p class="text-xs text-gray-500 mb-1">Current image:</p>
                                <img src="{{ $product->image }}" alt="Current Image" class="w-24 h-24 object-cover rounded-lg border">
                            </div>
                            @endif
                        </div>

                        <div class="mb-6">
                            <label for="description" class="block mb-2 text-sm font-medium text-gray-900">Description</label>
                            <textarea id="description" name="description" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" required>{{ old('description', $product->description) }}</textarea>
                        </div>

                        <div class="flex items-center gap-3">
                            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center transition-colors">Update Product</button>
                            <a href="{{ route('admin.products.index', [$destination->slug, $category->slug]) }}" class="text-gray-600 hover:text-gray-800 text-sm font-medium transition-colors">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
