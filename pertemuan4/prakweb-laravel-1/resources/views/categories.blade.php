<x-layout>
    <script src="https://cdn.tailwindcss.com"></script>
    <x-slot:title>
        Daftar Kategori
    </x-slot:title>

    <h2>Daftar Kategori</h2>

    @foreach ($categories as $category)
        <h3>
            <a href="/categories/{{ $category->slug }}">
                {{ $category->name }}
            </a> 
            <span>Total Post: {{ $category->posts->count() }}</span>
        </h3>
    <hr>
    @endforeach
    
</x-layout>