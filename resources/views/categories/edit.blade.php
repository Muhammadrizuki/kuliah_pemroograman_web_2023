@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Edit Category</h1>
    <form action="{{ route('categories.update', $category) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-700">Category Name</label>
            <input type="text" name="name" id="name" value="{{ $category->name }}" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2" />
        </div>
        <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded">Update Category</button>
    </form>
</div>
@endsection
