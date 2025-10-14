<?php

namespace App\Http\Controllers;

use App\Models\Medicine;
use App\Models\Category;
use App\Models\Supplier;
use Illuminate\Http\Request;

class MedicineController extends Controller
{
    // Display all medicines
    public function index()
    {
        $medicines = Medicine::with(['category', 'supplier'])->get();
        return view('medicines.index', compact('medicines'));
    }

    // Show form to create a new medicine
    public function create()
    {
        $categories = Category::all();
        $suppliers = Supplier::all();

        return view('medicines.create', compact('categories', 'suppliers'));
    }

    // Store a new medicine
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category_name' => 'required|string',
            'supplier_id' => 'nullable|exists:suppliers,supplier_id',
            'batch_number' => 'nullable|string|max:255',
            'quantity' => 'required|integer|min:0',
            'unit_price' => 'required|numeric|min:0',
            'expiry_date' => 'required|date|after_or_equal:today',
            'status' => 'required|in:Available,Low Stock,Expired',
        ]);

        // 🔍 Find category by name
        $category = Category::where('name', $request->category_name)->first();

        if (!$category) {
            return redirect()->back()->withErrors(['category_name' => 'Invalid category selected.']);
        }

        // 🧩 Replace category_name with category_id
        $validated['category_id'] = $category->category_id;
        unset($validated['category_name']);

        // ✅ Create new medicine
        Medicine::create($validated);

        return redirect()->route('medicines.index')->with('success', 'Medicine added successfully.');
    }

    // Show a single medicine
    public function show($id)
    {
        $medicine = Medicine::with(['category', 'supplier'])->findOrFail($id);
        return view('medicines.show', compact('medicine'));
    }

    // Show form to edit a medicine
    public function edit($id)
    {
        $medicine = Medicine::findOrFail($id);
        $categories = Category::all();
        $suppliers = Supplier::all();

        return view('medicines.edit', compact('medicine', 'categories', 'suppliers'));
    }

    // Update a medicine
    public function update(Request $request, $id)
    {
        $medicine = Medicine::findOrFail($id);

        $validated = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'category_name' => 'sometimes|required|string',
            'supplier_id' => 'nullable|exists:suppliers,supplier_id',
            'batch_number' => 'nullable|string|max:255',
            'quantity' => 'sometimes|required|integer|min:0',
            'unit_price' => 'sometimes|required|numeric|min:0',
            'expiry_date' => 'sometimes|required|date|after_or_equal:today',
            'status' => 'sometimes|required|in:Available,Low Stock,Expired',
        ]);

        // 🔍 Convert category name to ID if provided
        if ($request->has('category_name')) {
            $category = Category::where('name', $request->category_name)->first();

            if ($category) {
                $validated['category_id'] = $category->category_id;
            } else {
                return redirect()->back()->withErrors(['category_name' => 'Invalid category selected.']);
            }

            unset($validated['category_name']);
        }

        // ✅ Update medicine
        $medicine->update($validated);

        return redirect()->route('medicines.index')->with('success', 'Medicine updated successfully.');
    }

    // Delete a medicine
    public function destroy($id)
    {
        $medicine = Medicine::findOrFail($id);
        $medicine->delete();

        return redirect()->route('medicines.index')->with('success', 'Medicine deleted successfully.');
    }
}
