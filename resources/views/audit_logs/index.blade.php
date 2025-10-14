@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <!-- Header -->
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold text-gray-900 dark:text-gray-100">Audit Logs</h1>
    </div>

    <!-- Table -->
    <div class="bg-white dark:bg-gray-800 p-6 rounded-xl shadow-lg">
        <div class="overflow-x-auto">
            <table class="min-w-full border border-gray-300 dark:border-gray-700 rounded-lg overflow-hidden">
                <thead>
                    <tr class="bg-gray-100 dark:bg-gray-700 text-gray-900 dark:text-gray-100 text-left">
                        <th class="border-b border-gray-300 dark:border-gray-600 px-4 py-2">#</th>
                        <th class="border-b border-gray-300 dark:border-gray-600 px-4 py-2">User</th>
                        <th class="border-b border-gray-300 dark:border-gray-600 px-4 py-2">Action</th>
                        <th class="border-b border-gray-300 dark:border-gray-600 px-4 py-2">Model</th>
                        <th class="border-b border-gray-300 dark:border-gray-600 px-4 py-2">Record ID</th>
                        <th class="border-b border-gray-300 dark:border-gray-600 px-4 py-2">Date & Time</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($auditLogs as $log)
                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                            <td class="border-b border-gray-200 dark:border-gray-700 px-4 py-2">{{ $loop->iteration }}</td>
                            <td class="border-b border-gray-200 dark:border-gray-700 px-4 py-2">
                                {{ $log->user->name ?? 'System' }}
                            </td>
                            <td class="border-b border-gray-200 dark:border-gray-700 px-4 py-2">{{ ucfirst($log->action) }}</td>
                            <td class="border-b border-gray-200 dark:border-gray-700 px-4 py-2">{{ $log->auditable_type }}</td>
                            <td class="border-b border-gray-200 dark:border-gray-700 px-4 py-2">{{ $log->auditable_id }}</td>
                            <td class="border-b border-gray-200 dark:border-gray-700 px-4 py-2">
                                {{ \Carbon\Carbon::parse($log->created_at)->format('d M, Y H:i') }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center py-4 text-gray-600 dark:text-gray-300">
                                No audit logs found
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
