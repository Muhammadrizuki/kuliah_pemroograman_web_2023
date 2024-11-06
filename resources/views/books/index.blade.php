<!-- resources/views/books/index.blade.php -->
@extends('layouts.app')

@section('content')
    <h1 class="text-3xl font-bold mb-6">Books List</h1>

    @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <div class="mb-4">
        <a href="{{ route('books.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Add New Book
        </a>
    </div>

    <table class="min-w-full bg-white shadow rounded-lg">
        <thead>
            <tr>
                <th class="py-2 px-4 border-b">Title</th>
                <th class="py-2 px-4 border-b">Author</th>
                <th class="py-2 px-4 border-b">Category</th>
                <th class="py-2 px-4 border-b">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($books as $book)
                <tr class="hover:bg-gray-100">
                    <td class="py-2 px-4 border-b text-center">{{ $book->title }}</td>
                    <td class="py-2 px-4 border-b text-center">{{ $book->author->name }}</td>
                    <td class="py-2 px-4 border-b text-center">
                        <ul>
                        @foreach ($book->categories as $category)
                            <li>{{ $category->name }}</li>
                        @endforeach
                    </ul></td>
                    <td class="py-2 px-4 border-b text-center">
                        <a href="{{ route('books.edit', $book->id) }}" class="text-blue-500 hover:underline">Edit</a>
                        <form action="{{ route('books.destroy', $book->id) }}" method="POST" class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:underline ml-4">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
