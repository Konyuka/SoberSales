<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;


use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DrinkController;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])->group(function () {

    Route::get('/dashboard', function () { return Inertia::render('Dashboard');})->name('dashboard');

    Route::get('/products_home', [DashboardController::class, 'productsHome'])->name('products.home');


    Route::post('/add_product', [DrinkController::class, 'addProduct'])->name('add.product');


});
