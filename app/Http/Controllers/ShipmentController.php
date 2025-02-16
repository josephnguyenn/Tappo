<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shipment;

class ShipmentController extends Controller
{
    public function index() {
        return response()->json(Shipment::all());
    }

    public function show($id) {
        return response()->json(Shipment::findOrFail($id));
    }

    public function store(Request $request) {
        $shipment = Shipment::create($request->all());
        return response()->json($shipment, 201);
    }

    public function update(Request $request, $id) {
        $shipment = Shipment::findOrFail($id);
        $shipment->update($request->all());
        return response()->json($shipment, 200);
    }

    public function destroy($id) {
        Shipment::destroy($id);
        return response()->json(['message' => 'Shipment deleted'], 200);
    }
}
