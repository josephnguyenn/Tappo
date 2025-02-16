<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{
    public function index() {
        return response()->json(Customer::all());
    }

    public function show($id) {
        return response()->json(Customer::findOrFail($id));
    }

    public function store(Request $request) {
        $customer = Customer::create($request->all());
        return response()->json($customer, 201);
    }

    public function update(Request $request, $id) {
        $customer = Customer::findOrFail($id);
        $customer->update($request->all());
        return response()->json($customer, 200);
    }

    public function destroy($id) {
        Customer::destroy($id);
        return response()->json(['message' => 'Customer deleted'], 200);
    }
}
