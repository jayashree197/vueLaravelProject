<?php


use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CompanyController;
use Inertia\Inertia;

// Public Route (Welcome page)
Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

// Admin Routes with Authentication Middleware
Route::middleware(['auth', 'verified'])->prefix('admin')->group(function () {
    // Admin Dashboard
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

    // Resource route for companies
    Route::resource('companies', CompanyController::class);

    // Employee management routes
    Route::get('/companies/{company}/employees', [CompanyController::class, 'showEmployees'])->name('companies.employees');
    Route::post('/companies/{company}/employees', [CompanyController::class, 'createEmployee'])->name('companies.createEmployee');
    Route::delete('/companies/{company}/employees/{employee}', [CompanyController::class, 'deleteEmployee'])->name('companies.deleteEmployee');

    // Profile Routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Include Auth routes (register, login, etc.)
require __DIR__.'/auth.php';
