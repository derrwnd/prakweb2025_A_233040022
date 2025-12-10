<x-dashboard-layout>
    <x-slot:title>
        Edit Post - Dashboard
    </x-slot:title>

    <div class="max-w-2xl mx-auto">
        {{-- Header --}}
        <div class="mb-6">
            <h1 class="text-3xl font-bold text-gray-800 mb-2">Edit Post</h1>
        </div>

        {{-- Form Card --}}
        <div class="relative bg-white border border-gray-200 rounded-lg shadow-sm p-4 md:p-6">
            {{-- Form Header --}}
            <div class="flex items-center justify-between border-b border-gray-200 pb-4 md:pb-5 mb-4 md:mb-6">
                <h3 class="text-lg font-medium text-gray-900">
                    Update Post Information
                </h3>
            </div>

            {{-- Import Form Component --}}
            <form action="{{ route('dashboard.update', $post->slug) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="grid gap-4 grid-cols-2">
                    {{-- Title --}}
                    <div class="col-span-2">
                        <label for="title" class="block mb-2.5 text-sm font-medium text-gray-900">Title</label>
                        <input type="text" name="title" id="title" value="{{ old('title', $post->title) }}"
                            class="bg-gray-50 border border-gray-300 rounded-lg text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full px-3 py-2.5 shadow-sm placeholder:text-gray-500"
                            placeholder="Enter title">
                        @error('title')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Category --}}
                    <div class="col-span-2">
                        <label for="category_id" class="block mb-2.5 text-sm font-medium text-gray-900">Category</label>
                        <select name="category_id" id="category_id"
                            class="block w-full px-3 py-2.5 bg-gray-50 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 text-gray-900 text-sm shadow-sm placeholder:text-gray-500">
                            <option value="">— Select category —</option>

                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ old('category_id', $post->category_id) == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach

                        </select>
                        @error('category_id')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Excerpt --}}
                    <div class="col-span-2">
                        <label for="excerpt" class="block mb-2.5 text-sm font-medium text-gray-900">Excerpt</label>
                        <textarea name="excerpt" id="excerpt" rows="3"
                            class="block w-full px-3 py-2.5 bg-gray-50 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 text-gray-900 text-sm shadow-sm placeholder:text-gray-500"
                            placeholder="Write a short excerpt or summary">{{ old('excerpt', $post->excerpt) }}</textarea>
                        @error('excerpt')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Body --}}
                    <div class="col-span-2">
                        <label for="body" class="block mb-2.5 text-sm font-medium text-gray-900">Content</label>
                        <textarea name="body" id="body" rows="9"
                            class="block w-full px-3 py-2.5 bg-gray-50 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 text-gray-900 text-sm shadow-sm placeholder:text-gray-500"
                            placeholder="Write your post content here">{{ old('body', $post->body) }}</textarea>
                        @error('body')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Image Upload --}}
                    <div class="col-span-2">
                        <label for="image" class="block mb-2.5 text-sm font-medium text-gray-900">Upload Image</label>
                        @if ($post->image)
                            <div class="mb-3 p-3 bg-blue-50 border border-blue-200 rounded-lg">
                                <p class="text-sm text-gray-700">Current image: <span class="font-medium">{{ basename($post->image) }}</span></p>
                            </div>
                        @endif
                        <input
                            type="file"
                            name="image"
                            id="image"
                            accept="image/png, image/jpeg, image/jpg"
                            class="cursor-pointer bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm placeholder:text-gray-500">
                        @error('image')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                {{-- Form Footer --}}
                <div class="flex items-center space-x-4 border-t border-gray-200 pt-4 mb-4 md:mt-6">
                    <button type="submit"
                        class="inline-flex items-center text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 rounded-lg text-sm px-4 py-2.5 shadow-sm transition-colors">
                        Update Post
                    </button>

                    <a href="{{ route('dashboard.show', $post->slug) }}"
                        class="text-sm font-medium text-gray-900 border border-gray-300 bg-white hover:bg-gray-50 hover:text-gray-900 rounded-lg px-4 py-2.5 focus:outline-none">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
</x-dashboard-layout>
