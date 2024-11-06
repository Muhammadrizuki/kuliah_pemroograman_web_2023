<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel CRUD') }}</title>

    <!-- Include compiled CSS -->
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 font-sans leading-normal tracking-normal">

    <!-- Navbar -->
    <nav class="bg-gray-800 p-4 shadow-lg">
        <div class="container mx-auto flex justify-between items-center">
            <a href="{{ url('/') }}" class="text-white text-lg font-semibold">
                {{ config('app.name', 'Laravel CRUD') }}
            </a>
            <div class="space-x-4">
                <a href="{{ route('books.index') }}" class="text-gray-300 hover:text-white">Books</a>
                <a href="{{ route('authors.index') }}" class="text-gray-300 hover:text-white">Authors</a>
                <a href="{{ route('categories.index') }}" class="text-gray-300 hover:text-white">Categories</a>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container mx-auto my-8">
        @yield('content')
    </div>

</body>
</html>
