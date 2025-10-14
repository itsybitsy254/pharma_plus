@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold mb-6 text-gray-900 dark:text-gray-100">Edit User</h1>

    <div class="bg-white dark:bg-gray-800 p-6 rounded-xl shadow-lg max-w-2xl mx-auto">
        <form action="{{ route('users.update', $user) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label class="block text-gray-700 dark:text-gray-200 font-semibold mb-1">Name</label>
                <input type="text" name="name" value="{{ old('name', $user->name) }}" 
                       class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-gray-200"
                       required>
            </div>

            <div>
                <label class="block text-gray-700 dark:text-gray-200 font-semibold mb-1">Email</label>
                <input type="email" name="email" value="{{ old('email', $user->email) }}" 
                       class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-gray-200"
                       required>
            </div>

            <div class="flex justify-end space-x-2">
                <a href="{{ route('users.index') }}" 
                   class="px-5 py-2 bg-gray-400 text-white rounded-lg hover:bg-gray-500 transition">Cancel</a>
                <button type="submit" 
                        class="px-5 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">Update User</button>
            </div>
        </form>
    </div>
</div>
@endsection
