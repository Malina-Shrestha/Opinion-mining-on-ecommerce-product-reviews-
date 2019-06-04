<?php

namespace App\Http\Controllers\Front;

use App\Order;
use App\OrderDetail;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CartController extends Controller
{
    public function index()
    {
        if(request()->hasCookie('cart')) {
            $cart = request()->cookie('cart');

            $cart = json_decode($cart, true);


            foreach($cart as $item) {
                $product = Product::where('product_code', $item['code'])->first();
                $cart[$item['code']]['product'] = $product;
            }
        }
        else {
            $cart = [];
        }


        return view('front.cart.index', compact('cart'));

    }
    public function add(Product $product, $price, $qty = 1)
    {
        $item = [
            "$product->product_code" => [
                'code' => $product->product_code,
                'qty' => $qty,
                'price' => $price,
                'amount' => $qty * $price
            ]
        ];

        if(request()->hasCookie('cart')) {
            $cart = request()->cookie('cart');

            $cart = json_decode($cart, true);
        }
        else {
            $cart = [];
        }

        if (key_exists($product->product_code, $cart)) {
            $item[$product->product_code]['qty'] = $cart[$product->product_code]['qty'] + $qty;
            $item[$product->product_code]['amount'] = $item[$product->product_code]['qty'] * $item[$product->product_code]['price'];
        }

        $cart = array_merge($cart, $item);

        return response('ok')->cookie('cart', json_encode($cart), 30*24*60);


    }

    public function remove(Product $product)
    {
        $cart = request()->cookie('cart');
        $cart = json_decode($cart, true);

        if (key_exists($product->product_code, $cart)) {
            unset($cart[$product->product_code]);
        }

        flash('Cart is updated', 'success')->important();

        return redirect()->route('front.cart')->cookie('cart', json_encode($cart), 30*24*60);
    }

    public function details()
    {
        $items = 0;
        $total = 0;

        if(request()->hasCookie('cart')) {
            $cart = request()->cookie('cart');
            $cart = json_decode($cart, true);
            foreach($cart as $item) {
                $items += $item['qty'];
                $total += $item['amount'];
            }
        }

        $total = 'Rs.'.number_format($total);


        return response()->json(compact('items', 'total'));
    }

    public function update(Request $request)
    {
        $cart = request()->cookie('cart');
        $cart = json_decode($cart, true);

        foreach($request->qty as $key => $value) {
            $cart[$key]['qty'] = $value;
            $cart[$key]['amount'] = $cart[$key]['price'] * $value;
        }

        flash('Cart is updated', 'success')->important();

        return redirect()->route('front.cart')->cookie('cart', json_encode($cart), 30*24*60);

    }

    public function checkout()
    {
        $cart = request()->cookie('cart');
        $cart = json_decode($cart, true);

        $total = 0;
        foreach($cart as $item) {
            $total += $item['amount'];
        }
        $order = new Order;
        $order->user_id = auth('web')->id();
        $order->total = $total;
        $order->status = 'processing';
        $order->save();

        foreach($cart as $item) {
            $product = Product::where('product_code', $item['code'])->first();

            $detail = new OrderDetail;
            $detail->order_id = $order->id;
            $detail->product_id = $product->id;
            $detail->price = $item['price'];
            $detail->qty = $item['qty'];
            $detail->total = $item['amount'];
            $detail->save();
        }

        flash('Your order has been placed successfully and is being processed.', 'success')->important();

        return redirect('/')->cookie('cart', '', -10);
    }
}
