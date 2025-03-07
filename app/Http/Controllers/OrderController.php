<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function index() {
        return response()->json(Order::all());
    }

    public function show($id) {
        return response()->json(Order::findOrFail($id));
    }

    public function store(Request $request) {
        $order = Order::create($request->all());
        return response()->json($order, 201);
    }

    public function update(Request $request, $id) {
        $order = Order::findOrFail($id);
        $order->update($request->all());
        return response()->json($order, 200);
    }

    public function destroy($id) {
        Order::destroy($id);
        return response()->json(['message' => 'Order deleted'], 200);
    }
}
