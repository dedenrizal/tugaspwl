<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\WarehouseStockController;
use App\Http\Controllers\StockLogController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

// Halaman Beranda dan Autentikasi
Route::get('/', function () {
    return view('rumah');
});

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Rute Terproteksi
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard/admin', [DashboardController::class, 'index'])->name('dashboard.admin');

    // Rute Pengguna
    Route::resource('users', UserController::class);

    Route::get('/dashboard/users', [UserController::class, 'index']);
    Route::resource('branches', BranchController::class);
    Route::resource('stock-logs', StockLogController::class);
    Route::resource('products', ProductController::class);
    Route::resource('transactions', TransactionController::class);
    Route::resource('warehouse-stocks', WarehouseStockController::class);

    Route::get('transactions/show', [TransactionController::class, 'show'])->name('transaction.show');

    Route::delete('/branches/destroy/{id_cabang}', [BranchController::class, 'destroy'])->name('branch.destroy');
    Route::get('branch/{branch}/edit', [BranchController::class, 'edit'])->name('branch.edit');
    Route::put('/branch/update/{id_branch}', [BranchController::class, 'update'])->name('branch.update');

    Route::delete('/users/destroy/{id_user}', [UserController::class, 'destroy'])->name('user.destroy');
    Route::delete('/users/store', [UserController::class, 'store'])->name('user.store');
    Route::get('users/{user}/edit', [UserController::class, 'edit'])->name('user.edit');
    Route::put('/users/update/{id_user}', [UserController::class, 'update'])->name('user.update');
});
