<?php

namespace App\Http\Controllers\Back;

use App\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrdersController extends Controller
{
    public function index()
    {
        $orders = Order::get();

        return view('back.orders.index', compact('orders'));
    }

    public function destroy(Order $order)
    {
        $order->delete();

        flash('Order removed.', 'success');

        return redirect()->route('orders.index');

    }


}
