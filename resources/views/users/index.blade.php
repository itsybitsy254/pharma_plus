@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold mb-6 text-gray-900 dark:text-gray-100">Manage Users</h1>

    <div class="flex justify-end mb-4">
        <a href="{{ route('users.create') }}" 
           class="px-5 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">Add User</a>
    </div>

    <div class="bg-white dark:bg-gray-800 p-6 rounded-xl shadow-lg overflow-x-auto">
        <table class="w-full table-auto border border-gray-300 dark:border-gray-600">
            <thead>
                <tr class="bg-gray-100 dark:bg-gray-700">
                    <th class="px-4 py-2 text-left">ID</th>
                    <th class="px-4 py-2 text-left">Name</th>
                    <th class="px-4 py-2 text-left">Email</th>
                    <th class="px-4 py-2 text-left">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr class="border-t border-gray-300 dark:border-gray-600">
                    <td class="px-4 py-2">{{ $user->id }}</td>
                    <td class="px-4 py-2">{{ $user->name }}</td>
                    <td class="px-4 py-2">{{ $user->email }}</td>
                    <td class="px-4 py-2 space-x-2">
                        <a href="{{ route('users.edit', $user) }}" 
                           class="px-3 py-1 bg-yellow-500 text-white rounded-lg hover:bg-yellow-600 transition">Edit</a>

                        <form action="{{ route('users.destroy', $user) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" 
                                    class="px-3 py-1 bg-red-600 text-white rounded-lg hover:bg-red-700 transition"
                                    onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
