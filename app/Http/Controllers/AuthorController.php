<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    // Display a listing of authors
    public function index()
    {
        $authors = Author::all();
        return view('authors.index', compact('authors'));
    }

    // Show the form for creating a new author
    public function create()
    {
        return view('authors.create');
    }

    // Store a newly created author in the database
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Author::create([
            'name' => $request->name,
        ]);

        return redirect()->route('authors.index')->with('success', 'Author created successfully.');
    }

    // Show the form for editing an existing author
    public function edit(Author $author)
    {
        return view('authors.edit', compact('author'));
    }

    // Update the specified author in the database
    public function update(Request $request, Author $author)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $author->update([
            'name' => $request->name,
        ]);

        return redirect()->route('authors.index')->with('success', 'Author updated successfully.');
    }

    // Remove the specified author from the database
    public function destroy(Author $author)
    {
        $author->delete();

        return redirect()->route('authors.index')->with('success', 'Author deleted successfully.');
    }
}
