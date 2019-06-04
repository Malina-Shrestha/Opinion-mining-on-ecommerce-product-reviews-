<?php

namespace App\Http\Controllers\Front;

use App\Order;
use App\Review;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{

    public function index()
    {
        $user = auth('web')->user();

        $reviews = $user->reviews;

        $orders = $user->orders;

        return view('front.user.index', compact('user', 'reviews', 'orders'));
    }

    public function cancelOrder(Order $order)
    {
        $order->status = 'cancelled';
        $order->save();

        flash('Your order has been cancelled.', 'success')->important();

        return redirect()->route('user.index');
    }

    public function editReview(Review $review)
    {
        return view('front.user.edit', compact('review'));
    }

    public function updateReview(Request $request, Review $review)
    {
        $this->validate($request, [
            'comment' => 'required',
            'rating' => 'required'
        ]);

        $review->comment = $request->comment;
        $review->rating = $request->rating;
        $review->save();

        flash('Review updated', 'success')->important();

        return redirect()->route('user.index');
    }

    public function deleteReview(Review $review)
    {
        $review->delete();

        flash('Review removed', 'success')->important();

        return redirect()->route('user.index');
    }

}
