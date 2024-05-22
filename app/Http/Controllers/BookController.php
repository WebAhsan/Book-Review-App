<?php

namespace App\Http\Controllers;

use App\Models\books;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $books = books::orderBy('created_at', 'DESC');

        if (!empty($request->keyword)) {
            $books->where('title', 'like', '%' . $request->keyword . '%');
        }
        $books = $books->paginate(3);
        return view('book.booklist', [
            'books' => $books,
        ]);
    }

    public function addBook()
    {
        //
        return view('book.add');
    }
    public function addBookProccess(Request $request)
    {
        //
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'image' => 'required', // Assuming image upload field is used
            'description' => 'required|string',
        ]);

        // Custom validation messages

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $books =  new books();
        $books->title = $request->title;
        $books->author = $request->author;
        $books->description = $request->description;
        $books->save();

        if (!empty($request->image)) {
            $userimage = $request->image;
            $ext = $userimage->getClientOriginalExtension();
            $imagenum = time() . '.' . $ext;
            $userimage->move(public_path('uploads/book'), $imagenum);
            $books->image = $imagenum;
            $books->save();
        }

        return redirect()->back()->withSuccess('Your book added successfully!');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    public function editbook($id)
    {
        //
        $book = books::findOrFail($id);

        return view('book.edit', [
            'books' => $book,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function editauth(Request $request, $id)
    {
        //
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'image' => 'required', // Assuming image upload field is used
            'description' => 'required|string',
        ]);


        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }
        $books = books::findOrFail($id);
        $books->title = $request->title;
        $books->author = $request->author;
        $image = $request->image;
        $ext = $image->getClientOriginalExtension();
        $imagename = time() . '.' . $ext;
        $image->move(public_path('uploads/book/', $imagename));
        $books->image = $imagename;
        $books->description = $request->description;
        $books->save();

        return redirect()->route('books.booklist')->with('success', 'Book updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $book = books::findOrFail($id); // Find the book by its ID
        $book->delete(); // Delete the book

        return redirect()->route('books.booklist')->with('success', 'Book deleted successfully');
    }
}
