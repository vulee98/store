<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\User;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::all();
        return view('backend.orders.index', compact('orders'));
    }

    public function create()
    {
        $users = User::all();
        return view('backend.orders.create', compact('users'));
    }

    public function store(Request $request)
    {
        Order::create($request->all());
        return redirect()->route('backend.orders.index');
    }

    public function show(Order $order)
    {
        return view('backend.orders.show', compact('order'));
    }

    public function edit(Order $order)
    {
        $users = User::all();
        return view('backend.orders.edit', compact('order', 'users'));
    }

    public function update(Request $request, Order $order)
    {
        $order->update($request->all());
        return redirect()->route('backend.orders.index');
    }

    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->route('backend.orders.index');
    }

    public function changeStatus(Order $order, $status)
    {
        $order->status = $status;
        $order->save();
        return redirect()->route('backend.orders.index');
    }
}
