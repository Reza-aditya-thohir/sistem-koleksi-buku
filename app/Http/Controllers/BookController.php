<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $books = Book::query();

        if ($request->has('search')) {
            $keyword = $request->input('search');

            $books->where(function ($query) use ($keyword) {
                $query->where('title', 'like', "%$keyword%")
                    ->orWhere('author', 'like', "%$keyword%")
                    ->orWhere('isbn', 'like', "%$keyword%")
                    ->orWhere('year', 'like', "%$keyword%");
            });
        }

        $books = $books->paginate(6);

        return view('dashboard.books.index', compact('books'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('dashboard.books.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Book $book)
{
    $validatedData = $request->validate([
        'title' => 'required',
        'author' => 'required',
        'isbn' => 'required|unique:books',
        'year' => 'required|integer',
        'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'category_id' => 'required|exists:categories,id'
    ]);

    // Memeriksa apakah ada gambar sampul baru
    if ($request->file('cover_image')) {
        $validatedData['cover_image'] = $request->file('cover_image')->store('cover-images', 'public');
    }

    Book::create($validatedData);

    return redirect('/dashboard/books')->with('success', 'Book created successfully.');
}



    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {

        return view('dashboard.books.edit', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $book = Book::findOrFail($id);

        $rules = [
            'title' => 'required',
            'author' => 'required',
            'year' => 'required|integer',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ];

        if ($request->isbn != $book->isbn) {
            $rules['isbn'] = 'required|unique:books,isbn,' . $id;
        }

        $validatedData = $request->validate($rules);

        if ($request->file('cover_image')) {
            if ($book->cover_image) {
                // Hapus gambar lama jika ada
                Storage::disk('public')->delete($book->cover_image);
            }
            // Simpan gambar baru
            $validatedData['cover_image'] = $request->file('cover_image')->store('cover-images', 'public');
        }

        $book->update($validatedData);

        return redirect('/dashboard/books')->with('success', 'Book updated successfully.');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $book = Book::findOrFail($id);

        if ($book->cover_image) {
            // Hapus gambar jika ada
            Storage::disk('public')->delete($book->cover_image);
        }

        $book->delete();

        return redirect('/dashboard/books')->with('success', 'Book deleted successfully.');
    }
}
