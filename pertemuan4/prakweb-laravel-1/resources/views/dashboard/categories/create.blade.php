<x-dashboard-layout>
    <x-slot:title>Create Category - Dashboard</x-slot:title>

    <div class="max-w-2xl mx-auto">
        <h1 class="text-3xl font-bold text-gray-800 mb-6">Create New Category</h1>

        <div class="bg-white border border-gray-200 rounded-lg shadow-sm p-6">
            <form action="{{ route('dashboard.categories.store') }}" method="POST">
                @csrf

                <div class="mb-4">
                    <label for="name" class="block mb-2.5 text-sm font-medium text-gray-900">Category Name</label>
                    <input type="text" name="name" id="name" value="{{ old('name') }}"
                        class="bg-gray-50 border @error('name') border-red-600 @else border-gray-300 @enderror rounded-lg text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full px-3 py-2.5"
                        placeholder="Enter category name">
                    @error('name')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex items-center space-x-4 border-t border-gray-200 pt-4">
                    <button type="submit" class="inline-flex items-center text-white bg-blue-600 hover:bg-blue-700 rounded-lg text-sm px-4 py-2.5">
                        Create Category
                    </button>
                    <a href="{{ route('dashboard.categories.index') }}" class="text-sm font-medium text-gray-900 border border-gray-300 bg-white hover:bg-gray-50 rounded-lg px-4 py-2.5">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
</x-dashboard-layout>
