<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit St John Product') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('stjohn-products.update', $stjohnProduct->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label for="service_category" class="block mb-2 text-sm font-medium text-gray-900">Category</label>
                            <select id="service_category" name="service_category" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                @foreach($categories as $key => $label)
                                <option value="{{ $key }}" {{ $stjohnProduct->service_category == $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="title" class="block mb-2 text-sm font-medium text-gray-900">Title</label>
                            <input type="text" id="title" name="title" value="{{ $stjohnProduct->title }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                        </div>

                        <div class="mb-4">
                            <label for="price" class="block mb-2 text-sm font-medium text-gray-900">Price (e.g. RM 80)</label>
                            <input type="text" id="price" name="price" value="{{ $stjohnProduct->price }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                        </div>

                        <div class="mb-4">
                            <label for="status" class="block mb-2 text-sm font-medium text-gray-900">Status</label>
                            <select id="status" name="status" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                <option value="available" {{ $stjohnProduct->status == 'available' ? 'selected' : '' }}>Available / Ready</option>
                                <option value="sold_out" {{ $stjohnProduct->status == 'sold_out' ? 'selected' : '' }}>Sold Out</option>
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="image" class="block mb-2 text-sm font-medium text-gray-900">Image (Leave blank to keep current)</label>
                            <input type="file" id="image" name="image" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none">
                            @if($stjohnProduct->image)
                            <img src="{{ $stjohnProduct->image }}" alt="Current Image" class="mt-2 w-20 h-20 object-cover rounded">
                            @endif
                        </div>

                        <div class="mb-4">
                            <label for="description" class="block mb-2 text-sm font-medium text-gray-900">Description</label>
                            <textarea id="description" name="description" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" required>{{ $stjohnProduct->description }}</textarea>
                        </div>

                        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Update Product</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>