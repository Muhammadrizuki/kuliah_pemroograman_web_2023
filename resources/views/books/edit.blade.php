<!-- resources/views/books/edit.blade.php -->
@extends('layouts.app')

@section('content')
    <h1 class="text-3xl font-bold mb-6">Edit Book</h1>

    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('books.update', $book->id) }}" method="POST" class="bg-white p-6 rounded-lg shadow-md">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="title" class="block text-gray-700">Title</label>
            <input type="text" name="title" id="title" class="w-full p-2 border border-gray-300 rounded mt-1" value="{{ old('title', $book->title) }}" required>
        </div>

        <div class="mb-4">
            <label for="author_id" class="block text-gray-700">Author</label>
            <select name="author_id" id="author_id" class="w-full p-2 border border-gray-300 rounded mt-1" required>
                @foreach($authors as $author)
                    <option value="{{ $author->id }}" {{ $book->author_id == $author->id ? 'selected' : '' }}>{{ $author->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="category_ids" class="block text-sm font-medium text-gray-700">Categories</label>
            @foreach ($categories as $category)
                <div class="flex items-center">
                    <input type="checkbox" name="category_ids[]" value="{{ $category->id }}" id="category_{{ $category->id }}" class="mr-2" 
                        {{ $book->categories->contains($category) ? 'checked' : '' }}>
                    <label for="category_{{ $category->id }}" class="text-sm text-gray-600">{{ $category->name }}</label>
                </div>
            @endforeach
        </div>

        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Update Book
        </button>
    </form>
@endsection
