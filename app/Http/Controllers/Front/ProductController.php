<?php

namespace App\Http\Controllers\Front;

use App\Product;
use App\Review;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function show(Product $product)
    {
        $reviews = $product->reviews;

        $total = $reviews->count();

        $avg = $reviews->average('rating');

        if($total > 0) {
            $ratings = [
                1 => $product->reviews()->where('rating', 1)->get()->count() / $total * 100,
                2 => $product->reviews()->where('rating', 2)->get()->count() / $total * 100,
                3 => $product->reviews()->where('rating', 3)->get()->count() / $total * 100,
                4 => $product->reviews()->where('rating', 4)->get()->count() / $total * 100,
                5 => $product->reviews()->where('rating', 5)->get()->count() / $total * 100
            ];
        }
        else {
            $ratings = [
                1 => 0,
                2 => 0,
                3 => 0,
                4 => 0,
                5 => 0
            ];
        }

        $similar = Product::where('category_id', $product->category_id)->where('id', '!=', $product->id)->take(4)->get();

        return view('front.product.show', compact('product', 'reviews', 'total', 'avg', 'ratings', 'similar'));
    }

    public function storeReview(Request $request, Product $product)
    {
        $this->validate($request, [
            'comment' => 'required',
            'rating' => 'required'
        ]);

        $review = new Review;
        $review->comment = $request->comment;
        $review->rating = $request->rating;
        $review->product_id = $product->id;
        $review->user_id = auth('web')->id();
        $review->save();

        flash('Thank your for your review.', 'success')->important();

        return redirect()->route('front.product', $product->product_code);
    }


}
