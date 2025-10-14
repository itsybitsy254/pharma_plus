@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold mb-6 text-gray-900 dark:text-gray-100">Add Medicine</h1>

    <div class="bg-white dark:bg-gray-800 p-6 rounded-2xl shadow-lg max-w-2xl mx-auto">
        <form action="{{ route('medicines.store') }}" method="POST" class="space-y-5">
            @csrf

            <!-- Medicine Name -->
            <div>
                <label class="block text-gray-700 dark:text-gray-200 font-semibold mb-1">Medicine Name</label>
                <input type="text" name="name" value="{{ old('name') }}" 
                       placeholder="Enter medicine name"
                       required
                       class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-xl 
                              focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-gray-200">
                @error('name')
                    <p class="text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Category -->
            <div>
                <label class="block text-gray-700 dark:text-gray-200 font-semibold mb-1">Category</label>
                <select name="category_name" 
                        required
                        class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-xl 
                               focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-gray-200">
                    <option value="">-- Select Category --</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->name }}" 
                                {{ old('category_name') == $category->name ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
                @error('category_id')
                    <p class="text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Supplier -->
            <div>
                <label class="block text-gray-700 dark:text-gray-200 font-semibold mb-1">Supplier</label>
                <select name="supplier_id" 
                        class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-xl 
                               focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-gray-200">
                    <option value="">-- None --</option>
                    @foreach($suppliers as $supplier)
                        <option value="{{ $supplier->id }}" 
                                {{ old('supplier_id') == $supplier->id ? 'selected' : '' }}>
                            {{ $supplier->name }}
                        </option>
                    @endforeach
                </select>
                @error('supplier_id')
                    <p class="text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Quantity -->
            <div>
                <label class="block text-gray-700 dark:text-gray-200 font-semibold mb-1">Quantity</label>
                <input type="number" name="quantity" value="{{ old('quantity') }}" min="0"
                       required
                       class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-xl 
                              focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-gray-200">
                @error('quantity')
                    <p class="text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Unit Price -->
            <div>
                <label class="block text-gray-700 dark:text-gray-200 font-semibold mb-1">Unit Price</label>
                <input type="number" step="0.01" name="unit_price" value="{{ old('unit_price') }}" min="0"
                       required
                       class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-xl 
                              focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-gray-200">
                @error('unit_price')
                    <p class="text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Expiry Date -->
            <div>
                <label class="block text-gray-700 dark:text-gray-200 font-semibold mb-1">Expiry Date</label>
                <input type="date" name="expiry_date" value="{{ old('expiry_date') }}"
                       required
                       class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-xl 
                              focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-gray-200">
                @error('expiry_date')
                    <p class="text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Status -->
            <div>
                <label class="block text-gray-700 dark:text-gray-200 font-semibold mb-1">Status</label>
                <select name="status" required
                        class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-xl 
                               focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-gray-200">
                    <option value="Available" {{ old('status') == 'Available' ? 'selected' : '' }}>Available</option>
                    <option value="Low Stock" {{ old('status') == 'Low Stock' ? 'selected' : '' }}>Low Stock</option>
                    <option value="Expired" {{ old('status') == 'Expired' ? 'selected' : '' }}>Expired</option>
                </select>
                @error('status')
                    <p class="text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Buttons -->
            <div class="flex justify-end space-x-3 pt-4">
                <a href="{{ route('medicines.index') }}" 
                   class="px-5 py-2 bg-gray-400 text-white rounded-lg hover:bg-gray-500 transition">
                    Cancel
                </a>
                <button type="submit" 
                        class="px-5 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
                    Add Medicine
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
