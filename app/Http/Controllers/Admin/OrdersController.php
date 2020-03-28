<?php

namespace App\Http\Controllers\Admin;

use App\Orders;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrdersController extends Controller
{
    public function allOrders()
    {
        return view('admin.orders.orders', ['orders' => Orders::get()]);
    }

    public function edit($id)
    {
        return view('admin.orders.edit', ['order' => Orders::find($id), 'id' => $id]);
    }

    public function update()
    {
        $id = $_POST['id'];
        $order = Orders::find($id);
        $order->name = $_POST['name'];
        $order->email = $_POST['email'];
        $order->product_id = $_POST['product_id'];
        $order->save();

        return redirect()->route('orders');
    }

    public function remove($id)
    {
        Orders::destroy($id);
        return redirect()->route('orders');
    }
}
