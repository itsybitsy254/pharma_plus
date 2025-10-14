@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold text-gray-900 dark:text-gray-100 mb-6">Sales Report</h1>

    <!-- Filter Form -->
    <form method="GET" action="{{ route('sales.report') }}" class="mb-6 grid grid-cols-1 md:grid-cols-3 gap-4">
        <input type="date" name="from_date" class="p-2 rounded border border-gray-300 dark:border-gray-600" value="{{ request('from_date') }}">
        <input type="date" name="to_date" class="p-2 rounded border border-gray-300 dark:border-gray-600" value="{{ request('to_date') }}">
        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">Filter</button>
    </form>

    <!-- Sales Table -->
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
                            <td class="border-b border-gray-200 dark:border-gray-700 px-4 py-2">{{ \Carbon\Carbon::parse($sale->sale_date)->format('d M, Y') }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td class="text-center py-4 text-gray-600 dark:text-gray-300" colspan="6">No sales found</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Total -->
        <div class="mt-4 text-right font-semibold text-gray-800 dark:text-gray-200">
            Total Sales: KSh {{ number_format($sales->sum('total_price'), 2) }}
        </div>
    </div>
</div>
@endsection
