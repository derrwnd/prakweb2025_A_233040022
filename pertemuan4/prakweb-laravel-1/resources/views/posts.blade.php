<?php $title = 'Daftar Posts'; ?>
<x-layout :$title>
    <div class="max-w-4xl mx-auto mt-10">
        <h1 class="text-4xl font-bold mb-8">Daftar Posts</h1>

        @if($posts->count())
            <div class="grid gap-6">
                @foreach ($posts as $post)
                    <article class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition">
                        <h2 class="text-2xl font-bold mb-2">
                            <a href="{{ route('posts.show', $post->slug) }}" class="text-blue-600 hover:text-blue-800">
                                {{ $post->title }}
                            </a>
                        </h2>
                        
                        <div class="text-sm text-gray-600 mb-3">
                            <span>Oleh: <strong>{{ $post->author->name ?? 'Unknown' }}</strong></span>
                            @if($post->category)
                                <span class="mx-2">|</span>
                                <span>Kategori: <strong>{{ $post->category->name }}</strong></span>
                            @endif
                        </div>

                        <p class="text-gray-700 mb-4">{{ $post->excerpt }}</p>

                        <a href="{{ route('posts.show', $post->slug) }}" class="text-blue-600 hover:text-blue-800 font-semibold">
                            Baca Selengkapnya →
                        </a>
                    </article>
                @endforeach
            </div>
        @else
            <div class="bg-blue-100 border-l-4 border-blue-600 p-4 rounded">
                <p class="text-blue-800">Belum ada postingan. Silakan cek lagi nanti.</p>
            </div>
        @endif
    </div>
</x-layout>
