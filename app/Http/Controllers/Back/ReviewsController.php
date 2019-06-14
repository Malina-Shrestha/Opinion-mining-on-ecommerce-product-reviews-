<?php

namespace App\Http\Controllers\Back;

use App\Review;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReviewsController extends Controller
{
    public function index()
    {
        $reviews = Review::get();

        return view('back.reviews.index', compact('reviews'));
    }

    public function destroy(Review $review)
    {
        $review->delete();

        flash('Review removed.', 'success');

        return redirect()->route('reviews.index');

    }
}
