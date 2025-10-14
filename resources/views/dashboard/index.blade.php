@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold mb-6 text-gray-800">PharmaPlus Analytics</h1>

    <!-- Summary Cards -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
        <div class="bg-gray-800 p-6 rounded shadow text-center">
            <h2 class="text-lg font-semibold text-white">Total Medicines</h2>
            <p class="text-2xl font-bold text-yellow-400">{{ $totalMedicines ?? 0 }}</p>
        </div>

        <div class="bg-orange-100 p-6 rounded shadow text-center">
            <h2 class="text-lg font-semibold text-orange-800">Expiring Soon</h2>
            <p class="text-2xl font-bold text-orange-600">{{ $expiringMedicines ?? 0 }}</p>
        </div>

        <div class="bg-red-100 p-6 rounded shadow text-center">
            <h2 class="text-lg font-semibold text-red-800">Low Stock</h2>
            <p class="text-2xl font-bold text-red-600">{{ $lowStockCount ?? 0 }}</p>
        </div>
    </div>

    <!-- Recent Sales Table -->
    <div class="bg-white p-6 rounded shadow mb-6">
        <h2 class="text-xl font-semibold mb-4 text-gray-800">Recent Sales</h2>
        <div class="overflow-x-auto">
            <table class="w-full table-auto border-collapse border border-gray-300 text-black">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="border p-2 text-left">Receipt #</th>
                        <th class="border p-2 text-left">Medicine</th>
                        <th class="border p-2 text-left">Quantity</th>
                        <th class="border p-2 text-left">Total Price</th>
                        <th class="border p-2 text-left">Date</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($recentSales ?? [] as $sale)
                        <tr class="hover:bg-gray-100">
                            <td class="border p-2">{{ $sale->receipt_number }}</td>
                            <td class="border p-2">{{ $sale->medicine->name ?? 'N/A' }}</td>
                            <td class="border p-2">{{ $sale->quantity_sold }}</td>
                            <td class="border p-2">{{ number_format($sale->total_price, 2) }}</td>
                            <td class="border p-2">{{ \Carbon\Carbon::parse($sale->sale_date)->format('d M, Y') }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td class="border p-2 text-center" colspan="5">No sales yet</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Alerts Section -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
        <div class="bg-red-100 p-6 rounded shadow">
            <h2 class="text-lg font-semibold mb-4 text-red-800">Low Stock Alerts</h2>
            <ul class="list-disc list-inside text-red-700">
                @forelse($lowStockMedicines ?? [] as $medicine)
                    <li>{{ $medicine->name }} ({{ $medicine->quantity }} left)</li>
                @empty
                    <li>No low stock medicines</li>
                @endforelse
            </ul>
        </div>

        <div class="bg-orange-100 p-6 rounded shadow">
            <h2 class="text-lg font-semibold mb-4 text-orange-800">Expiry Alerts</h2>
            <ul class="list-disc list-inside text-orange-700">
                @forelse($expiringSoonMedicines ?? [] as $medicine)
                    <li>{{ $medicine->name }} (Expiring on {{ \Carbon\Carbon::parse($medicine->expiry_date)->format('d M, Y') }})</li>
                @empty
                    <li>No medicines expiring soon</li>
                @endforelse
            </ul>
        </div>
    </div>

    <!-- Sales Chart -->
    <div class="bg-white p-6 rounded shadow">
        <h2 class="text-xl font-semibold mb-4 text-gray-800">Sales Chart</h2>
        <canvas id="salesChart" class="w-full h-64"></canvas>
    </div>
</div>

<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
const ctx = document.getElementById('salesChart').getContext('2d');
new Chart(ctx, {
    type: 'line',
    data: {
        labels: @json($salesLabels ?? []),
        datasets: [{
            label: 'Total Sales (KSh)',
            data: @json($salesTotals ?? []),
            backgroundColor: 'rgba(59, 130, 246, 0.2)',
            borderColor: 'rgba(59, 130, 246, 1)',
            borderWidth: 2,
            fill: true,
            tension: 0.3
        }]
    },
    options: {
        responsive: true,
        plugins: {
            legend: { display: true, position: 'top' },
            tooltip: { mode: 'index', intersect: false }
        },
        scales: {
            x: { title: { display: true, text: 'Date' } },
            y: { title: { display: true, text: 'Sales (KSh)' }, beginAtZero: true }
        }
    }
});
</script>
@endsection
