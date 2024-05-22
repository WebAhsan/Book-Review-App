<?php

namespace App\Http\Controllers;

use App\Models\books;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

        $booksProduct = books::where('status', 1)->paginate(5); // Assuming 10 items per page
        return view('welcome', [
            'books' => $booksProduct,
        ]);
    }

    public function singleBook(Request $request, $id)
    {
        //

        $books = books::with('reviews')->findOrFail($id);




        $relatedBooks = books::where('status', 1)
            ->where('id', '!=', $books->id)
            ->take(5)
            ->get();

        return view('single', [
            'books' => $books,
            'relatedBooks' => $relatedBooks,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */

    public function search(Request $request)
    {
        $query = $request->Searchbar;

        if (!empty($query)) {
            $books = books::where('title', 'like', "%$query%")->paginate(10);
        } else {
            $books = books::paginate(10); // If no query is provided, show all books
        }

        return view('welcome', compact('books'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // Check if the user has already submitted a review for this book
        $countReview = Review::where('user_id', Auth::user()->id)->where('book_id', $request->book_id)->count();

        if ($countReview > 0) {
            return response()->json(['message' => 'You have already submitted a review for this book.'], 200);
        }

        // Validate the request data
        $validator = Validator::make($request->all(), [
            'review' => 'required|min:10',
            'rating' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => 'The review field is required and must be at least 10 characters long. The rating is required and must be an integer between 1 and 5.'], 200);
        }

        // Create a new review in the database
        $review = new Review();
        $review->review = $request->review;
        $review->rating = $request->rating;
        $review->book_id = $request->book_id;
        $review->user_id = Auth::id();

        $review->save();

        // Return a JSON response
        return response()->json(['message' => 'Review submitted successfully!'], 200);
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
