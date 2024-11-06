@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Categories</h1>
    <a href="{{ route('categories.create') }}" class="bg-blue-500 text-white py-2 px-4 rounded">Add Category</a>
    <table class="min-w-full mt-4">
        <thead>
            <tr>
                <th class="px-4 py-2">ID</th>
                <th class="px-4 py-2">Name</th>
                <th class="px-4 py-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
            <tr>
                <td class="border px-4 py-2">{{ $category->id }}</td>
                <td class="border px-4 py-2">{{ $category->name }}</td>
                <td class="border px-4 py-2">
                    <a href="{{ route('categories.edit', $category) }}" class="text-yellow-500">Edit</a>
                    <form action="{{ route('categories.destroy', $category) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-500">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
