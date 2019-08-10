<?php

namespace App\Http\Controllers\Front;

use App\Product;
use App\Review;
use SentimentAnalysis;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function show(Product $product)
    {
        $reviews = $product->reviews->take(10);
        $positive_reviews = Review::where('positive_review',true)->count();
        $negative_reviews = Review::where('positive_review',false)->count();
        $neutral_reviews = Review::where('positive_review',null)->count();
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

        return view('front.product.show', compact('product', 'reviews', 'total', 'avg', 'ratings', 'similar','positive_reviews','negative_reviews','neutral_reviews'));
    }

    public function storeReview(Request $request, Product $product)
    {
        $this->validate($request, [
            'comment' => 'required',
            'rating' => 'required'
        ]);
        $analysis = new SentimentAnalysis();
        $sentimentAnalysis = $analysis->decision($request->comment);
        if($sentimentAnalysis === 'positive'){
            $sentiments = true;
        }elseif ($sentimentAnalysis === 'negative'){
            $sentiments = false;
        }else{
            $sentiments = null;
        }
        $review = new Review;
        $review->comment = $request->comment;
        $review->positive_review = $sentiments;
        $review->rating = $request->rating;
        $review->product_id = $product->id;
        $review->user_id = auth('web')->id();
        $review->save();

        flash('Thank your for your review.', 'success')->important();

        return redirect()->route('front.product', $product->product_code);
    }


}
