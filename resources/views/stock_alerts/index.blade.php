@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold text-gray-900 dark:text-gray-100 mb-6">Stock Alerts</h1>

    <div class="bg-white dark:bg-gray-800 p-6 rounded-xl shadow-lg">
        <div class="overflow-x-auto">
            <table class="min-w-full border border-gray-300 dark:border-gray-700 rounded-lg overflow-hidden">
                <thead>
                    <tr class="bg-gray-100 dark:bg-gray-700 text-gray-900 dark:text-gray-100 text-left">
                        <th class="border-b border-gray-300 dark:border-gray-600 px-4 py-2">#</th>
                        <th class="border-b border-gray-300 dark:border-gray-600 px-4 py-2">Medicine</th>
                        <th class="border-b border-gray-300 dark:border-gray-600 px-4 py-2">Alert Type</th>
                        <th class="border-b border-gray-300 dark:border-gray-600 px-4 py-2">Message</th>
                        <th class="border-b border-gray-300 dark:border-gray-600 px-4 py-2 text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($alerts as $alert)
                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                            <td class="border-b border-gray-200 dark:border-gray-700 px-4 py-2">{{ $loop->iteration }}</td>
                            <td class="border-b border-gray-200 dark:border-gray-700 px-4 py-2">{{ $alert->medicine->name ?? 'N/A' }}</td>
                            <td class="border-b border-gray-200 dark:border-gray-700 px-4 py-2">{{ ucfirst(str_replace('_', ' ', $alert->alert_type)) }}</td>
                            <td class="border-b border-gray-200 dark:border-gray-700 px-4 py-2">{{ $alert->alert_message }}</td>
                            <td class="border-b border-gray-200 dark:border-gray-700 px-4 py-2 text-center">
                                <form action="{{ route('stock_alerts.destroy', $alert->id) }}" 
                                      method="POST"
                                      onsubmit="return confirm('Are you sure you want to delete this alert?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="px-3 py-1 bg-red-600 text-white rounded-md hover:bg-red-700 transition">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center py-4 text-gray-600 dark:text-gray-300">
                                No stock alerts found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
