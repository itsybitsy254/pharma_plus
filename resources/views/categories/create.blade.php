@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold mb-6 text-gray-900 dark:text-gray-100">Add Category</h1>

    <div class="bg-white dark:bg-gray-800 p-6 rounded-xl shadow-lg max-w-2xl mx-auto">
        <form action="{{ route('categories.store') }}" method="POST" class="space-y-4">
            @csrf

            <!-- Name -->
            <div>
                <label class="block text-gray-700 dark:text-gray-200 font-semibold mb-1">Category Name</label>
                <input type="text" name="name" value="{{ old('name') }}" 
                       class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-gray-200"
                       placeholder="Enter category name" required>
                @error('name')
                    <p class="text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Description -->
            <div>
                <label class="block text-gray-700 dark:text-gray-200 font-semibold mb-1">Description</label>
                <textarea name="description" rows="4"
                          class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-gray-200"
                          placeholder="Enter description">{{ old('description') }}</textarea>
                @error('description')
                    <p class="text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Submit -->
            <div class="flex justify-end">
                <a href="{{ route('categories.index') }}" 
                   class="px-5 py-2 bg-gray-400 text-white rounded-lg hover:bg-gray-500 transition mr-2">Cancel</a>
                <button type="submit" 
                        class="px-5 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
                    Add Category
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
