@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold mb-6 text-gray-900 dark:text-gray-100">Edit Medicine</h1>

    <div class="bg-white dark:bg-gray-800 p-6 rounded-xl shadow-lg max-w-2xl mx-auto">
       <form action="{{ route('medicines.update', $medicine) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')

            <!-- Name -->
            <div>
                <label class="block text-gray-700 dark:text-gray-200 font-semibold mb-1">Medicine Name</label>
                <input type="text" name="name" value="{{ old('name', $medicine->name) }}" 
                       class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-gray-200" required>
            </div>

            <!-- Category -->
            <div>
                <label class="block text-gray-700 dark:text-gray-200 font-semibold mb-1">Category</label>
                <select name="category_id" required
                        class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-gray-200">
                    <option value="">-- Select Category --</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ $medicine->category_id == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Supplier -->
            <div>
                <label class="block text-gray-700 dark:text-gray-200 font-semibold mb-1">Supplier</label>
                <select name="supplier_id" 
                        class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-gray-200">
                    <option value="">-- None --</option>
                    @foreach($suppliers as $supplier)
                        <option value="{{ $supplier->id }}" {{ $medicine->supplier_id == $supplier->id ? 'selected' : '' }}>
                            {{ $supplier->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Quantity -->
            <div>
                <label class="block text-gray-700 dark:text-gray-200 font-semibold mb-1">Quantity</label>
                <input type="number" name="quantity" value="{{ old('quantity', $medicine->quantity) }}" min="0"
                       class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-gray-200" required>
            </div>

            <!-- Unit Price -->
            <div>
                <label class="block text-gray-700 dark:text-gray-200 font-semibold mb-1">Unit Price</label>
                <input type="number" step="0.01" name="unit_price" value="{{ old('unit_price', $medicine->unit_price) }}" min="0"
                       class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-gray-200" required>
            </div>

            <!-- Expiry Date -->
            <div>
                <label class="block text-gray-700 dark:text-gray-200 font-semibold mb-1">Expiry Date</label>
                <input type="date" name="expiry_date" value="{{ old('expiry_date', $medicine->expiry_date) }}"
                       class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-gray-200" required>
            </div>

            <!-- Status -->
            <div>
                <label class="block text-gray-700 dark:text-gray-200 font-semibold mb-1">Status</label>
                <select name="status" required
                        class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-gray-200">
                    <option value="Available" {{ $medicine->status == 'Available' ? 'selected' : '' }}>Available</option>
                    <option value="Low Stock" {{ $medicine->status == 'Low Stock' ? 'selected' : '' }}>Low Stock</option>
                    <option value="Expired" {{ $medicine->status == 'Expired' ? 'selected' : '' }}>Expired</option>
                </select>
            </div>

            <!-- Submit -->
            <div class="flex justify-end space-x-2">
                <a href="{{ route('medicines.index') }}" 
                   class="px-5 py-2 bg-gray-400 text-white rounded-lg hover:bg-gray-500 transition">Cancel</a>
                <button type="submit" 
                        class="px-5 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">Update Medicine</button>
            </div>
        </form>
    </div>
</div>
@endsection
