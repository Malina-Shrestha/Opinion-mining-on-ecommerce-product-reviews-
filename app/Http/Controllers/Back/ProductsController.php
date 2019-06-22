<?php

namespace App\Http\Controllers\Back;

use App\Category;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::paginate(10);

        return view('back.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::select('id','name')->get()->pluck('name', 'id');
        return view('back.products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'product_code' => 'required|unique:products,product_code',
            'description' => 'required',
            'price' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
            'location' => 'required',
            'featured' => 'required'
        ]);

        $product = new Product;
        $product->name = $request->name;
        $product->product_code = $request->product_code;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->discount = $request->discount;
        $product->category_id = $request->category_id;
        $product->location = $request->location;
        $product->featured = $request->featured;

        if ($request->hasFile('image')) {
            $img = Image::make($request->image);
            $ext = $request->image->extension();
            $filename = 'img_'.date('sdHmYi').'_'.rand(1000, 9999).'.'.$ext;
+
            $img->resize(1000,1000, function ($constraints) {
                $constraints->aspectRatio();
                $constraints->upsize();
            })->save('public/images/'.$filename);

            $product->image = $filename;
        }
        $product->save();

        flash('Product added', 'success');

        return redirect()->route('products.index');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories = Category::select('id','name')->get()->pluck('name', 'id');
        return view('back.products.edit', compact('categories', 'product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
     {
         $this->validate($request, [
             'name' => 'required',
             'product_code' => 'required',
             'description' => 'required',
             'price' => 'required|numeric',
             'category_id' => 'required|exists:categories,id',
             'location' => 'required',
             'featured' => 'required'
         ]);

         $product->name = $request->name;
         $product->product_code = $request->product_code;
         $product->description = $request->description;
         $product->price = $request->price;
         $product->discount = $request->discount;
         $product->category_id = $request->category_id;
         $product->location = $request->location;
         $product->featured = $request->featured;

         if ($request->hasFile('image')) {
             $img = Image::make($request->image);
             $ext = $request->image->extension();
             $filename = 'img_'.date('sdHmYi').'_'.rand(1000, 9999).'.'.$ext;

             $img->resize(1000,1000, function ($constraints) {
                 $constraints->aspectRatio();
                 $constraints->upsize();
             })->save('public/images/'.$filename);

             if(!empty($product->image)) {
                 @unlink('public/images/'.$product->image);
             }

             $product->image = $filename;
         }
         $product->save();

        flash('Product updated.', 'success');

        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        if(!empty($product->image)) {
            @unlink('public/images/'.$product->image);
        }

        $product->delete();

        flash('Product removed.', 'success');

        return redirect()->route('products.index');
    }
}
