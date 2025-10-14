<?php

namespace App\Http\Controllers;

use App\Models\StockAlert;
use Illuminate\Http\Request;

class StockAlertController extends Controller
{
    /**
     * Display all stock alerts.
     */
    public function index()
    {
        $alerts = StockAlert::with('medicine')->get();
        return view('stock_alerts.index', compact('alerts'));
    }

    /**
     * Delete a stock alert.
     */
    public function destroy($id)
    {
        $alert = StockAlert::findOrFail($id);
        $alert->delete();

        return redirect()->route('stock_alerts.index')
                         ->with('success', 'Stock alert deleted successfully.');
    }
}
