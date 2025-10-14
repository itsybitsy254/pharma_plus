@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <!-- Header -->
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold text-gray-900 dark:text-gray-100">Sales</h1>
        <a href="{{ route('sales.create') }}" 
           class="px-5 py-2 bg-blue-600 text-white font-semibold rounded-lg shadow hover:bg-blue-700 transition">
           + Add Sale
        </a>
    </div>

    <!-- Table -->
    <div class="bg-white dark:bg-gray-800 p-6 rounded-xl shadow-lg">
        <div class="overflow-x-auto">
            <table class="min-w-full border border-gray-300 dark:border-gray-700 rounded-lg overflow-hidden">
                <thead>
                    <tr class="bg-gray-100 dark:bg-gray-700 text-gray-900 dark:text-gray-100 text-left">
                        <th class="border-b border-gray-300 dark:border-gray-600 px-4 py-2">#</th>
                        <th class="border-b border-gray-300 dark:border-gray-600 px-4 py-2">Receipt #</th>
                        <th class="border-b border-gray-300 dark:border-gray-600 px-4 py-2">Medicine</th>
                        <th class="border-b border-gray-300 dark:border-gray-600 px-4 py-2">Quantity</th>
                        <th class="border-b border-gray-300 dark:border-gray-600 px-4 py-2">Total Price</th>
                        <th class="border-b border-gray-300 dark:border-gray-600 px-4 py-2">Date</th>
                        <th class="border-b border-gray-300 dark:border-gray-600 px-4 py-2 text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($sales as $sale)
                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                            <td class="border-b border-gray-200 dark:border-gray-700 px-4 py-2">{{ $loop->iteration }}</td>
                            <td class="border-b border-gray-200 dark:border-gray-700 px-4 py-2">{{ $sale->receipt_number }}</td>
                            <td class="border-b border-gray-200 dark:border-gray-700 px-4 py-2">{{ $sale->medicine->name ?? 'N/A' }}</td>
                            <td class="border-b border-gray-200 dark:border-gray-700 px-4 py-2">{{ $sale->quantity_sold }}</td>
                            <td class="border-b border-gray-200 dark:border-gray-700 px-4 py-2">{{ number_format($sale->total_price, 2) }}</td>
                            <td class="border-b border-gray-200 dark:border-gray-700 px-4 py-2">
                                {{ \Carbon\Carbon::parse($sale->sale_date)->format('d M, Y') }}
                            </td>
                            <td class="border-b border-gray-200 dark:border-gray-700 px-4 py-2 text-center space-x-2">
                                @can('admin') {{-- Only admins can edit/delete --}}
                                    <a href="{{ route('sales.edit', $sale->sale_id) }}" 
                                       class="px-3 py-1 bg-yellow-400 text-white rounded-md hover:bg-yellow-500 transition">
                                       Edit
                                    </a>
                                    <form action="{{ route('sales.destroy', $sale->sale_id) }}" 
                                          method="POST" 
                                          class="inline-block"
                                          onsubmit="return confirm('Are you sure you want to delete this sale?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                                class="px-3 py-1 bg-red-600 text-white rounded-md hover:bg-red-700 transition">
                                            Delete
                                        </button>
                                    </form>
                                @endcan
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td class="text-center py-4 text-gray-600 dark:text-gray-300" colspan="7">
                                No sales found
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
