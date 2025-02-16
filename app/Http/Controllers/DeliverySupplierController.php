<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DeliverySupplier;

class DeliverySupplierController extends Controller
{
    public function index() {
        return response()->json(DeliverySupplier::all());
    }

    public function show($id) {
        return response()->json(DeliverySupplier::findOrFail($id));
    }

    public function store(Request $request) {
        $request->validate([
            'delivery_supplier_name' => 'required|string|unique:delivery_supplier'
        ]);

        $supplier = DeliverySupplier::create($request->all());
        return response()->json($supplier, 201);
    }

    public function update(Request $request, $id) {
        $supplier = DeliverySupplier::findOrFail($id);
        $supplier->update($request->all());
        return response()->json($supplier, 200);
    }

    public function destroy($id) {
        DeliverySupplier::destroy($id);
        return response()->json(['message' => 'Delivery Supplier deleted'], 200);
    }
}
