<x-dashboard-layout>
    <x-slot:title>Categories - Dashboard</x-slot:title>

    <div class="max-w-4xl mx-auto">
        <div class="mb-6 flex justify-between items-center">
            <h1 class="text-3xl font-bold text-gray-800">Manage Categories</h1>
            <a href="{{ route('dashboard.categories.create') }}"
               class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg">
                ➕ Add Category
            </a>
        </div>

        @if(session('success'))
        <div class="flex items-center p-4 mb-4 text-sm text-green-700 rounded-lg bg-green-50 border border-green-200">
            <p>{{ session('success') }}</p>
        </div>
        @endif

        <div class="overflow-x-auto bg-white shadow-sm rounded-lg border border-gray-200">
            <table class="w-full text-sm text-left rtl:text-right text-gray-700">
                <thead class="text-sm text-gray-700 bg-gray-100 border-b border-gray-200">
                    <tr>
                        <th class="px-6 py-3 font-medium">No</th>
                        <th class="px-6 py-3 font-medium">Name</th>
                        <th class="px-6 py-3 font-medium">Slug</th>
                        <th class="px-6 py-3 font-medium">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($categories as $index => $category)
                    <tr class="bg-white border-b border-gray-200 hover:bg-gray-50">
                        <td class="px-6 py-4">{{ $index + 1 }}</td>
                        <td class="px-6 py-4 font-medium text-gray-900">{{ $category->name }}</td>
                        <td class="px-6 py-4 text-gray-600">{{ $category->slug }}</td>
                        <td class="px-6 py-4">
                            <div class="flex items-center space-x-2">
                                <a href="{{ route('dashboard.categories.edit', $category) }}"
                                   class="text-blue-600 hover:text-blue-800 font-medium text-sm">Edit</a>
                                <form action="{{ route('dashboard.categories.destroy', $category) }}" method="POST" class="inline" onsubmit="return confirm('Delete this category?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-800 font-medium text-sm">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="px-6 py-12 text-center text-gray-500">
                            No categories yet. <a href="{{ route('dashboard.categories.create') }}" class="text-blue-600 hover:underline">Create one</a>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-dashboard-layout>
