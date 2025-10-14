<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\User;
use App\Models\Medicine;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    // Show all sales in the UI
    public function index()
    {
        $sales = Sale::with(['user', 'medicine'])->get();
        return view('sales.index', compact('sales'));
    }

    // Show the create sale form
    public function create()
    {
        $medicines = Medicine::all();
        $users = User::all(); // optional, if you want to select user
        return view('sales.create', compact('medicines', 'users'));
    }

    // Store a new sale
    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'nullable|exists:users,user_id',
            'medicine_id' => 'required|exists:medicines,medicine_id',
            'quantity_sold' => 'required|integer|min:1',
            'total_price' => 'required|numeric|min:0',
            'sale_date' => 'nullable|date',
            'receipt_number' => 'required|string|unique:sales,receipt_number',
        ]);

        $sale = Sale::create($validated);

        return redirect()->route('sales.index')
                         ->with('success', 'Sale created successfully!');
    }

    // Show a single sale (optional for UI)
    public function show($id)
    {
        $sale = Sale::with(['user', 'medicine'])->findOrFail($id);
        return view('sales.show', compact('sale')); // create this view if needed
    }

    // Show edit sale form
    public function edit($id)
    {
        $sale = Sale::findOrFail($id);
        $medicines = Medicine::all();
        $users = User::all(); // optional
        return view('sales.edit', compact('sale', 'medicines', 'users'));
    }

    // Update a sale
    public function update(Request $request, $id)
    {
        $sale = Sale::findOrFail($id);

        $validated = $request->validate([
            'user_id' => 'nullable|exists:users,user_id',
            'medicine_id' => 'sometimes|required|exists:medicines,medicine_id',
            'quantity_sold' => 'sometimes|required|integer|min:1',
            'total_price' => 'sometimes|required|numeric|min:0',
            'sale_date' => 'nullable|date',
            'receipt_number' => 'sometimes|required|string|unique:sales,receipt_number,' . $sale->sale_id . ',sale_id',
        ]);

        $sale->update($validated);

        return redirect()->route('sales.index')
                         ->with('success', 'Sale updated successfully!');
    }

    // Delete a sale
    public function destroy($id)
    {
        $sale = Sale::findOrFail($id);
        $sale->delete();

        return redirect()->route('sales.index')
                         ->with('success', 'Sale deleted successfully!');
    }

    // Sales report
    public function report(Request $request)
    {
        $query = Sale::with('medicine');

        if ($request->from_date) {
            $query->whereDate('sale_date', '>=', $request->from_date);
        }

        if ($request->to_date) {
            $query->whereDate('sale_date', '<=', $request->to_date);
        }

        $sales = $query->get();

        return view('sales.report', compact('sales'));
    }
}
