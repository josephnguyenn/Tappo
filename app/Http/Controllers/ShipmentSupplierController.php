<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ShipmentSupplier;

class ShipmentSupplierController extends Controller
{
    public function index() {
        return response()->json(ShipmentSupplier::all());
    }

    public function show($id) {
        return response()->json(ShipmentSupplier::findOrFail($id));
    }

    public function store(Request $request) {
        $request->validate([
            'supplier_name' => 'required|string|unique:shipment_supplier'
        ]);

        $supplier = ShipmentSupplier::create($request->all());
        return response()->json($supplier, 201);
    }

    public function update(Request $request, $id) {
        $supplier = ShipmentSupplier::findOrFail($id);
        $supplier->update($request->all());
        return response()->json($supplier, 200);
    }

    public function destroy($id) {
        ShipmentSupplier::destroy($id);
        return response()->json(['message' => 'Shipment Supplier deleted'], 200);
    }
}
