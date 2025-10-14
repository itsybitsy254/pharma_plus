@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold mb-6 text-gray-900 dark:text-gray-100">Edit Supplier</h1>

    <div class="bg-white dark:bg-gray-800 p-6 rounded-xl shadow-lg max-w-2xl mx-auto">
        <form action="{{ route('suppliers.update', $supplier->supplier_id) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')

            <!-- Supplier Name -->
            <div>
                <label class="block text-gray-700 dark:text-gray-200 font-semibold mb-1">Supplier Name</label>
                <input type="text" name="supplier_name" value="{{ old('supplier_name', $supplier->supplier_name) }}" 
                       class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg 
                              focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-gray-200" required>
                @error('supplier_name')
                    <p class="text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Email -->
            <div>
                <label class="block text-gray-700 dark:text-gray-200 font-semibold mb-1">Email</label>
                <input type="email" name="email" value="{{ old('email', $supplier->email) }}" 
                       class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg 
                              focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-gray-200">
                @error('email')
                    <p class="text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Phone -->
            <div>
                <label class="block text-gray-700 dark:text-gray-200 font-semibold mb-1">Phone</label>
                <input type="text" name="phone" value="{{ old('phone', $supplier->phone) }}" 
                       class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg 
                              focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-gray-200">
                @error('phone')
                    <p class="text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Address -->
            <div>
                <label class="block text-gray-700 dark:text-gray-200 font-semibold mb-1">Address</label>
                <textarea name="address" rows="3" 
                          class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg 
                                 focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-gray-200">{{ old('address', $supplier->address) }}</textarea>
                @error('address')
                    <p class="text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Submit -->
            <div class="flex justify-end space-x-2">
                <a href="{{ route('suppliers.index') }}" 
                   class="px-5 py-2 bg-gray-400 text-white rounded-lg hover:bg-gray-500 transition">Cancel</a>
                <button type="submit" 
                        class="px-5 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">Update Supplier</button>
            </div>
        </form>
    </div>
</div>
@endsection
