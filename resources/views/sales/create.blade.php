@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold text-gray-900 dark:text-gray-100 mb-6">Add New Sale</h1>

    <div class="bg-white dark:bg-gray-800 p-6 rounded-xl shadow-lg max-w-3xl mx-auto">
        <form action="{{ route('sales.store') }}" method="POST" class="space-y-4">
            @csrf

            <!-- Receipt Number -->
            <div>
                <label class="block text-gray-700 dark:text-gray-200 font-semibold mb-1">Receipt Number</label>
                <input type="text" name="receipt_number" value="{{ old('receipt_number') }}"
                       class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-gray-200"
                       placeholder="Enter receipt number" required>
                @error('receipt_number')
                    <p class="text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Medicine Dropdown -->
            <div>
                <label class="block text-gray-700 dark:text-gray-200 font-semibold mb-1">Medicine</label>
                <select name="medicine_id" required
                        class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-gray-200">
                    <option value="">-- Select Medicine --</option>
                    @foreach($medicines as $medicine)
                        <option value="{{ $medicine->medicine_id }}" {{ old('medicine_id') == $medicine->medicine_id ? 'selected' : '' }}>
                            {{ $medicine->name }}
                        </option>
                    @endforeach
                </select>
                @error('medicine_id')
                    <p class="text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Quantity Sold -->
            <div>
                <label class="block text-gray-700 dark:text-gray-200 font-semibold mb-1">Quantity Sold</label>
                <input type="number" name="quantity_sold" min="1" value="{{ old('quantity_sold') }}"
                       class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-gray-200"
                       placeholder="Enter quantity sold" required>
                @error('quantity_sold')
                    <p class="text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Sale Date -->
            <div>
                <label class="block text-gray-700 dark:text-gray-200 font-semibold mb-1">Sale Date</label>
                <input type="date" name="sale_date" value="{{ old('sale_date', now()->format('Y-m-d')) }}"
                       class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-gray-200"
                       required>
                @error('sale_date')
                    <p class="text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Total Price -->
            <div>
                <label class="block text-gray-700 dark:text-gray-200 font-semibold mb-1">Total Price</label>
                <input type="number" name="total_price" step="0.01" min="0" value="{{ old('total_price') }}"
                       class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-gray-200"
                       placeholder="Enter total price" required>
                @error('total_price')
                    <p class="text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Submit Buttons -->
            <div class="flex justify-end space-x-2">
                <a href="{{ route('sales.index') }}"
                   class="px-5 py-2 bg-gray-400 text-white rounded-lg hover:bg-gray-500 transition">Cancel</a>
                <button type="submit"
                        class="px-5 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">Add Sale</button>
            </div>
        </form>
    </div>
</div>
@endsection
