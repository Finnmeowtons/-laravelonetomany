<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::get();
        return response()->json($books);
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'student_id' => 'required|exists:students,id',
        ]);

        $book = Book::create($validatedData);
        return response()->json($book, 201); // 201 Created status
    }

    public function update(Request $request, Book $book)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'student_id' => 'required|exists:students,id',
        ]);

        $book->update($validatedData);
        return response()->json($book);
    }

    public function destroy(Book $book)
    {
        $book->delete();

        return response()->json(null, 204);
    }

}
