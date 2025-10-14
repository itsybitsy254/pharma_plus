<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MedicineController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StockAlertController;
use App\Http\Controllers\AuditLogController;
use App\Http\Controllers\SupplierController;
use Illuminate\Support\Facades\Route;

// Public route
Route::get('/', fn() => view('welcome'));

// Dashboard (authenticated & verified)
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// Authenticated routes
Route::middleware(['auth'])->group(function () {

    // Profile management
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Medicines & Categories
    Route::resource('medicines', MedicineController::class);
    Route::resource('categories', CategoryController::class);

    // Suppliers
    Route::resource('suppliers', SupplierController::class);

    // Sales routes (all authenticated users)
    Route::get('sales', [SaleController::class, 'index'])->name('sales.index');
    Route::get('sales/create', [SaleController::class, 'create'])->name('sales.create');
    Route::post('sales', [SaleController::class, 'store'])->name('sales.store');
    Route::get('sales/{sale}', [SaleController::class, 'show'])->name('sales.show');
    Route::get('sales/{sale}/edit', [SaleController::class, 'edit'])->name('sales.edit');
    Route::put('sales/{sale}', [SaleController::class, 'update'])->name('sales.update');
    Route::delete('sales/{sale}', [SaleController::class, 'destroy'])->name('sales.destroy');

    // Users (all authenticated users)
    Route::resource('users', UserController::class);

    // Stock Alerts
    Route::get('/stock-alerts', [StockAlertController::class, 'index'])->name('stock_alerts.index');
    Route::delete('/stock-alerts/{stock_alert}', [StockAlertController::class, 'destroy'])->name('stock_alerts.destroy');

    // Audit Logs
    Route::get('/audit-logs', [AuditLogController::class, 'index'])->name('audit_logs.index');
});

require __DIR__.'/auth.php';
