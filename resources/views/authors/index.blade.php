<!-- resources/views/authors/index.blade.php -->
@extends('layouts.app')

@section('content')
    <h1 class="text-3xl font-bold mb-6">Authors List</h1>

    @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <div class="mb-4">
        <a href="{{ route('authors.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Add New Author
        </a>
    </div>

    <table class="min-w-full bg-white shadow rounded-lg">
        <thead>
            <tr>
                <th class="py-2 px-4 border-b">Name</th>
                <th class="py-2 px-4 border-b">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($authors as $author)
                <tr class="hover:bg-gray-100">
                    <td class="py-2 px-4 border-b text-center">{{ $author->name }}</td>
                    <td class="py-2 px-4 border-b text-center">
                        <a href="{{ route('authors.edit', $author->id) }}" class="text-blue-500 hover:underline">Edit</a>
                        <form action="{{ route('authors.destroy', $author->id) }}" method="POST" class="inline-block">
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
