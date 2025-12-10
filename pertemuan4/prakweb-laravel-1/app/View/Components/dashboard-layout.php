<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- Tambahkan slot baru dengan nama title --}}
    <title>{{$title}}</title>
  @vite('resources/css/app.css')
    <script src="../path/to/flowbite/dist/flowbite.min.js"></script>
</head>

<body class="flex flex-col min-h-screen">
    <nav class="bg-gray-900 p-4 mb-4 flex justify-between items-center shadow-md">
        <div class="flex gap-4">
            <a href="/home" class="text-white hover:text-gray-200">Home</a>
            <a href="/about" class="text-white hover:text-gray-200">About</a>
            <a href="/service" class="text-white hover:text-gray-200">Services</a>
            <a href="/contact" class="text-white hover:text-gray-200">Contact</a>
            <a href="/categories" class="text-white hover:text-gray-200">Category</a>
        </div>
        <div class="flex gap-4 items-center">
            @auth
                <span class="text-white">{{ auth()->user()->name }}</span>
                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf
                    <button type="submit" class="bg-red-600 text-white px-4 py-1 rounded hover:bg-red-700">
                        Logout
                    </button>
                </form>
            @else
                <a href="{{ route('login') }}" class="bg-white text-indigo-900 px-4 py-1 rounded hover:bg-gray-100 font-medium transition duration-300">
                    Login
                </a>
                <a href="{{ route('register') }}" class="bg-lime-300 text-indigo-900 px-4 py-1 rounded hover:bg-lime-400 font-bold transition duration-300">
                    Register
                </a>
            @endauth
        </div>
    </nav>
    <main class="flex-1">
        {{$slot}}
    </main>

    
    <footer class="bg-gray-200 text-center py-4 mt-10 text-sm text-gray-600">
        <p>Copyright </p>
    </footer>
</body>

</html>