<?php

use App\Http\Controllers\Auth\AccountController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\BeneficiaryController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('guest')->group(function () {
    Route::get('/', function () {
        return view('Auth.login');
    })->name('login');

    Route::post('/login', [AuthController::class, 'authenticate'])->name('auth.login');
});

Route::middleware('auth')->group(function () {
    // Admin Routes
    Route::middleware('role:admin')->group(function () {
        Route::get('/admin', function () {
            return view('Dashboards.admin');
        })->name('dashboard.admin');

        // Account Routes
        Route::get('/account', [AccountController::class, 'index'])->name('account.page');
    });

    // Employee Routes
    Route::middleware('role:employee')->group(function () {
        Route::get('/dashboard', function () {
            return view('Dashboards.employee');
        })->name('dashboard.employee');
    });

    // Beneficiary Routes
    Route::resource('beneficiary', BeneficiaryController::class);

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::get('/force-logout', function (Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect('/')->with('message', 'You have been logged out.');
})->name('force.logout');
