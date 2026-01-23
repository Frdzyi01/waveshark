<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Landing Service') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('landing-services.update', $service->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                        @csrf
                        @method('PUT')

                        <!-- Title (H3) -->
                        <div>
                            <label for="title" class="block text-sm font-medium text-gray-700">Title (H3)</label>
                            <input type="text" name="title" id="title" value="{{ $service->title }}" required
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                        </div>

                        <!-- Description (P) -->
                        <div>
                            <label for="description" class="block text-sm font-medium text-gray-700">Description (P)</label>
                            <textarea name="description" id="description" rows="4" required
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">{{ $service->description }}</textarea>
                        </div>

                        <!-- Image -->
                        <div>
                            <label for="image" class="block text-sm font-medium text-gray-700">Image Icon</label>

                            @if($service->image)
                            <div class="mb-2">
                                <img src="{{ asset($service->image) }}" alt="Current Image" class="h-20 w-auto rounded border p-1">
                            </div>
                            @endif

                            <input type="file" name="image" id="image" accept="image/*"
                                class="mt-1 block w-full text-sm text-gray-500
                                file:mr-4 file:py-2 file:px-4
                                file:rounded-md file:border-0
                                file:text-sm file:font-semibold
                                file:bg-indigo-50 file:text-indigo-700
                                hover:file:bg-indigo-100">
                            <p class="mt-1 text-sm text-gray-500">Leave empty to keep current image.</p>
                        </div>

                        <div class="flex justify-end gap-4">
                            <a href="{{ route('landing-services.index') }}" class="px-4 py-2 border border-gray-300 rounded-md text-gray-700 hover:bg-gray-50 transition-colors">Cancel</a>
                            <button type="submit" class="px-4 py-2 bg-black text-white rounded-md hover:bg-gray-800 transition-colors">
                                Update Service
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>