<?php

namespace App\Http\Controllers\Admin;

use App\Models\Orders;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


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

    public function update(Request $request)
    {
        $id = $_POST['id'];
        $data = $request->only(['product_id', 'name', 'email']);
        Orders::find($id)->update($data);

        return redirect()->route('orders');
    }

    public function remove($id)
    {
        Orders::destroy($id);
        return redirect()->route('orders');
    }
}
