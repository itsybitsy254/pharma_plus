<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // Display all categories
    public function index()
    {
        $categories = Category::with('medicines')->get();
        return view('categories.index', compact('categories'));
    }

    // Show the form to create a new category
    public function create()
    {
        return view('categories.create');
    }

    // Store a new category
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:categories,name',
            'description' => 'nullable|string',
        ]);

        Category::create($validated);

        return redirect()->route('categories.index')
                         ->with('success', 'Category created successfully!');
    }

    // Show the form to edit an existing category
    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }

    // Update an existing category
    public function update(Request $request, Category $category)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:categories,name,' . $category->category_id . ',category_id',
            'description' => 'nullable|string',
        ]);

        $category->update($validated);

        return redirect()->route('categories.index')
                         ->with('success', 'Category updated successfully!');
    }

    // Delete a category
    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('categories.index')
                         ->with('success', 'Category deleted successfully!');
    }
}
