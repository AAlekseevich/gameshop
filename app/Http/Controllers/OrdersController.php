<?php

namespace App\Http\Controllers;

use App\Orders;
use App\Products;
use Illuminate\Support\Facades\Auth;

class OrdersController extends Controller
{
    public function myOrders()
    {
        $sum = 0;
        $prod = [];
        $orders = Orders::where('email', '=', Auth::user()->email)->get();
        foreach ($orders as $order) {
            $prod[] = $order->product_id;
        }
        $products = Products::find($prod);
        foreach ($products as $product) {
            $sum += $product->price;
        }
        return view('orders', ['products' => $products, 'orders' => $orders, 'sum' => $sum]);
    }

    public function orderCreate()
    {
        $order = new Orders();
        $order->product_id = $_POST['product_id'];
        $order->name = $_POST['name'];
        $order->email = $_POST['email'];
        $order->save();

        return redirect()->route('product', ['id' => $_POST['product_id']]);
    }
}
