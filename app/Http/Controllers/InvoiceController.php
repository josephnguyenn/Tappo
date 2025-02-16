<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Invoice;

class InvoiceController extends Controller
{
    public function index() {
        return response()->json(Invoice::all());
    }

    public function show($id) {
        return response()->json(Invoice::findOrFail($id));
    }

    public function store(Request $request) {
        $invoice = Invoice::create($request->all());
        return response()->json($invoice, 201);
    }

    public function update(Request $request, $id) {
        $invoice = Invoice::findOrFail($id);
        $invoice->update($request->all());
        return response()->json($invoice, 200);
    }

    public function destroy($id) {
        Invoice::destroy($id);
        return response()->json(['message' => 'Invoice deleted'], 200);
    }
}
