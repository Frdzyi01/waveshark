<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add New St John Product') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('stjohn-products.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-4">
                            <label for="service_category" class="block mb-2 text-sm font-medium text-gray-900">Category</label>
                            <select id="service_category" name="service_category" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                @php
                                    // Filter: hanya tampilkan 3 yacht aktif (St John Islands)
                                    // Value (slug) tetap asli agar backend tidak berubah
                                    $stjohnAllowed = [
                                        'stjohn-car-rental',
                                        'stjohn-island-hopping',
                                        'stjohn-airport-transfer',
                                    ];
                                    $stjohnYachtNames = [
                                        'stjohn-car-rental'       => 'Leviathan 8',
                                        'stjohn-island-hopping'   => 'Ocean Diva',
                                        'stjohn-airport-transfer' => 'SG Yacht',
                                    ];
                                @endphp
                                @foreach($categories as $key => $label)
                                    @if(in_array($key, $stjohnAllowed))
                                        <option value="{{ $key }}">
                                            {{ $stjohnYachtNames[$key] ?? $label }}
                                        </option>
                                    @endif
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="title" class="block mb-2 text-sm font-medium text-gray-900">Title</label>
                            <input type="text" id="title" name="title" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                        </div>

                        <div class="mb-4">
                            <label for="price" class="block mb-2 text-sm font-medium text-gray-900">Price (e.g. SGD $)</label>
                            <input type="text" id="price" name="price" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                        </div>

                        <div class="mb-4">
                            <label for="status" class="block mb-2 text-sm font-medium text-gray-900">Status</label>
                            <select id="status" name="status" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                <option value="available">Available / Ready</option>
                                <option value="sold_out">Sold Out</option>
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="image" class="block mb-2 text-sm font-medium text-gray-900">Image</label>
                            <input type="file" id="image" name="image" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none" required>
                        </div>

                        <div class="mb-4">
                            <label for="description" class="block mb-2 text-sm font-medium text-gray-900">Description</label>
                            <textarea id="description" name="description" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" required></textarea>
                        </div>

                        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Save Product</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>