<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OutletController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Autentikasi
Route::get('/login', [AuthController::class, 'login'])->name('login.index');
Route::post('/login', [AuthController::class, 'processLogin'])->name('login.process');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    // Dashboard
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    // User
    Route::prefix('users')->middleware('role:admin')->name('users.')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('index');
        Route::get('/create', [UserController::class, 'create'])->name('create');
        Route::post('/create', [UserController::class, 'store'])->name('store');
        Route::get('/{user}/edit', [UserController::class, 'edit'])->name('edit');
        Route::put('/{user}/edit', [UserController::class, 'update'])->name('update');
        Route::delete('/{user}/delete', [UserController::class, 'destroy'])->name('destroy');
    });

    // Customer
    Route::prefix('customers')->middleware('role:admin,kasir')->name('customers.')->group(function () {
        Route::get('/', [CustomerController::class, 'index'])->name('index');
        Route::get('/create', [CustomerController::class, 'create'])->name('create');
        Route::post('/create', [CustomerController::class, 'store'])->name('store');
        Route::get('/{customer}/edit', [CustomerController::class, 'edit'])->name('edit');
        Route::put('/{customer}/edit', [CustomerController::class, 'update'])->name('update');
        Route::delete('/{customer}/delete', [CustomerController::class, 'destroy'])->name('destroy');
    });

    // Outlet
    Route::prefix('outlets')->middleware('role:admin')->name('outlets.')->group(function () {
        Route::get('/', [OutletController::class, 'index'])->name('index');
        Route::get('/create', [OutletController::class, 'create'])->name('create');
        Route::post('/create', [OutletController::class, 'store'])->name('store');
        Route::get('/{outlet}/edit', [OutletController::class, 'edit'])->name('edit');
        Route::put('/{outlet}/edit', [OutletController::class, 'update'])->name('update');
        Route::delete('/{outlet}/delete', [OutletController::class, 'destroy'])->name('destroy');
    });

    // Package
    Route::prefix('packages')->middleware('role:admin')->name('packages.')->group(function () {
        Route::get('/', [PackageController::class, 'index'])->name('index');
        Route::get('/create', [PackageController::class, 'create'])->name('create');
        Route::post('/create', [PackageController::class, 'store'])->name('store');
        Route::get('/{package}/edit', [PackageController::class, 'edit'])->name('edit');
        Route::put('/{package}/edit', [PackageController::class, 'update'])->name('update');
        Route::delete('/{package}/delete', [PackageController::class, 'destroy'])->name('destroy');
    });

    // Transaction
    Route::prefix('transactions')->middleware('role:admin,kasir')->name('transactions.')->group(function () {
        Route::get('/', [TransactionController::class, 'index'])->name('index');
        Route::get('/{kode_transaksi}/detail', [TransactionController::class, 'detail'])->name('detail');
        Route::post('/{kode_transaksi}/detail', [TransactionController::class, 'storeTransactionDetail'])->name('storeTransactionDetail');
        Route::get('/create', [TransactionController::class, 'create'])->name('create');
        Route::post('/create', [TransactionController::class, 'store'])->name('store');
        Route::get('/{kode_transaksi}/edit', [TransactionController::class, 'edit'])->name('edit');
        Route::put('/{kode_transaksi}/edit', [TransactionController::class, 'update'])->name('update');
        Route::delete('/{kode_transaksi}/delete', [TransactionController::class, 'destroy'])->name('destroy');
    });
});
