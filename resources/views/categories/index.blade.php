@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <!-- Header -->
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold text-gray-900 dark:text-gray-100">Categories</h1>
        <a href="{{ route('categories.create') }}" 
           class="px-5 py-2 bg-blue-600 text-white font-semibold rounded-lg shadow hover:bg-blue-700 transition">
           + Add Category
        </a>
    </div>

    <!-- Table -->
    <div class="bg-white dark:bg-gray-800 p-6 rounded-xl shadow-lg">
        <div class="overflow-x-auto">
            <table class="min-w-full border border-gray-300 dark:border-gray-700 rounded-lg overflow-hidden">
                <thead>
                    <tr class="bg-gray-100 dark:bg-gray-700 text-gray-900 dark:text-gray-100 text-left">
                        <th class="border-b border-gray-300 dark:border-gray-600 px-4 py-2">#</th>
                        <th class="border-b border-gray-300 dark:border-gray-600 px-4 py-2">Name</th>
                        <th class="border-b border-gray-300 dark:border-gray-600 px-4 py-2">Description</th>
                        <th class="border-b border-gray-300 dark:border-gray-600 px-4 py-2 text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($categories as $category)
                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                            <td class="border-b border-gray-200 dark:border-gray-700 px-4 py-2 text-gray-800 dark:text-gray-200">
                                {{ $loop->iteration }}
                            </td>
                            <td class="border-b border-gray-200 dark:border-gray-700 px-4 py-2 text-gray-800 dark:text-gray-200">
                                {{ $category->name }}
                            </td>
                            <td class="border-b border-gray-200 dark:border-gray-700 px-4 py-2 text-gray-800 dark:text-gray-200">
                                {{ $category->description ?? '-' }}
                            </td>
                            <td class="border-b border-gray-200 dark:border-gray-700 px-4 py-2 text-center space-x-2">
                                <a href="{{ route('categories.edit', $category->category_id) }}" 
                                   class="px-3 py-1 bg-yellow-400 text-white rounded-md hover:bg-yellow-500 transition">
                                   Edit
                                </a>

                                <form action="{{ route('categories.destroy', $category->category_id) }}" 
                                      method="POST" 
                                      class="inline-block"
                                      onsubmit="return confirm('Are you sure you want to delete this category?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                            class="px-3 py-1 bg-red-600 text-white rounded-md hover:bg-red-700 transition">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td class="text-center py-4 text-gray-600 dark:text-gray-300" colspan="4">
                                No categories found
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
