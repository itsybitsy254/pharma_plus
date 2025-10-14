<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    // List all suppliers
    public function index()
    {
        $suppliers = Supplier::all();
        return view('suppliers.index', compact('suppliers'));
    }

    // Show form to create supplier
    public function create()
    {
        return view('suppliers.create');
    }

    // Store a new supplier
    public function store(Request $request)
    {
        $request->validate([
            'supplier_name' => 'required|string|max:255',
            'phone' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:255',
            'address' => 'nullable|string|max:255',
        ]);

        Supplier::create($request->only(['supplier_name', 'phone', 'email', 'address']));

        return redirect()->route('suppliers.index')->with('success', 'Supplier added successfully.');
    }

    // Show form to edit supplier
    public function edit(Supplier $supplier)
    {
        return view('suppliers.edit', compact('supplier'));
    }

    // Update a supplier
    public function update(Request $request, Supplier $supplier)
    {
        $request->validate([
            'supplier_name' => 'required|string|max:255',
            'phone' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:255',
            'address' => 'nullable|string|max:255',
        ]);

        $supplier->update($request->only(['supplier_name', 'phone', 'email', 'address']));

        return redirect()->route('suppliers.index')->with('success', 'Supplier updated successfully.');
    }

    // Delete a supplier
    public function destroy(Supplier $supplier)
    {
        $supplier->delete();
        return redirect()->route('suppliers.index')->with('success', 'Supplier deleted successfully.');
    }
}
