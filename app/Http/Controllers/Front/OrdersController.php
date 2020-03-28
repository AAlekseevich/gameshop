<?php

namespace App\Http\Controllers\Front;


use App\Http\Controllers\Controller;
use App\Models\Orders;
use App\Models\Products;
use Illuminate\Http\Request;
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

    public function orderCreate(Request $request)
    {
        $data = $request->only(['product_id', 'name', 'email']);
        Orders::create($data);
        return redirect()->route('product', ['id' => $_POST['product_id']]);
    }
}
