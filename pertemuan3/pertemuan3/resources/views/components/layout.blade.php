<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- Tambahkan slot baru dengan nama title --}}
    <title>{{$title}}</title>
    @vite('resources/css/app.css')
</head>

<body class="flex flex-col min-h-screen">
    <nav class="p-4 mb-4 flex justify-between">
        <a href="/">Home</a>
        <a href="/about">About</a>
        <a href="/categories">Category</a>
        <a href="/service">Services</a>
        <a href="/contact">Contact</a>
    </nav>
    <main class="flex-1">
        {{$slot}}
    </main>

    
    <footer class="bg-gray-200 text-center py-4 mt-10 text-sm text-gray-600">
        <p>Copyright © 2025  Deri</p>
    </footer>
</body>

</html>