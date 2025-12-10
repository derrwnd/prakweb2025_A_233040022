<x-dashboard-layout>
    <x-slot:title>
        Edit Category - Dashboard
    </x-slot:title>

    <div class="max-w-2xl mx-auto">
        <div class="mb-6">
            <h1 class="text-3xl font-bold text-gray-800">Edit Category</h1>
        </div>

        <div class="bg-white border border-gray-200 rounded-lg shadow-sm p-6">
            <form action="{{ route('dashboard.categories.update', $category) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="grid gap-4 grid-cols-1">
                    {{-- Name --}}
                    <div>
                        <label for="name" class="block mb-2.5 text-sm font-medium text-gray-900">Category Name</label>
                        <input type="text" name="name" id="name" value="{{ old('name', $category->name) }}"
                            class="bg-gray-50 border @error('name') border-red-600 @else border-gray-300 @enderror rounded-lg text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full px-3 py-2.5 shadow-sm placeholder:text-gray-500"
                            placeholder="Enter category name">
                        @error('name')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Slug --}}
                    <div>
                        <label for="slug" class="block mb-2.5 text-sm font-medium text-gray-900">Slug (Optional)</label>
                        <input type="text" name="slug" id="slug" value="{{ old('slug', $category->slug) }}"
                            class="bg-gray-50 border @error('slug') border-red-600 @else border-gray-300 @enderror rounded-lg text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full px-3 py-2.5 shadow-sm placeholder:text-gray-500"
                            placeholder="Leave empty for auto-generate">
                        @error('slug')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="flex items-center space-x-4 border-t border-gray-200 pt-4 mt-6">
                    <button type="submit"
                        class="inline-flex items-center text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 rounded-lg text-sm px-4 py-2.5 shadow-sm transition-colors">
                        Update Category
                    </button>

                    <a href="{{ route('dashboard.categories.index') }}"
                        class="text-sm font-medium text-gray-900 border border-gray-300 bg-white hover:bg-gray-50 rounded-lg px-4 py-2.5 focus:outline-none">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
</x-dashboard-layout>
