<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Medicine;
use App\Models\Sale;
use Carbon\Carbon;

class DashboardController extends Controller
{
    /**
     * Display the PharmaPlus dashboard.
     */
    public function index()
    {
        // === Summary counts ===
        $totalMedicines = Medicine::count();
        $expiringMedicines = Medicine::where('expiry_date', '<', Carbon::now()->addDays(30))->count();
        $lowStockCount = Medicine::where('quantity', '<', 10)->count();

        // === Detailed lists for alerts ===
        $lowStockMedicines = Medicine::where('quantity', '<', 10)->get();
        $expiringSoonMedicines = Medicine::where('expiry_date', '<', Carbon::now()->addDays(30))->get();

        // === Recent sales (latest 5) ===
        $recentSales = Sale::with('medicine')
            ->latest()
            ->take(5)
            ->get();

        // === Chart data (sales over time) ===
        $salesData = Sale::selectRaw('DATE(sale_date) as date, SUM(total_price) as total')
            ->groupBy('date')
            ->orderBy('date', 'asc')
            ->get();

        $salesLabels = $salesData->pluck('date')->map(fn($d) => Carbon::parse($d)->format('M d'));
        $salesTotals = $salesData->pluck('total');

        // === Pass data to the view ===
        return view('dashboard.index', compact(
            'totalMedicines',
            'expiringMedicines',
            'lowStockCount',
            'lowStockMedicines',
            'expiringSoonMedicines',
            'recentSales',
            'salesLabels',
            'salesTotals'
        ));
    }
}
