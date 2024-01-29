<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', [HomeController::class, 'index']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

// Admin Page Routes
Route::get('/hub', [HomeController::class, 'redirect'])->name('hub');
Route::get('/view_category', [AdminController::class, 'view_category'])->name('view-category');
Route::post('/add_category', [AdminController::class, 'add_category'])->name('add-category');
Route::get('/delete_category/{id}', [AdminController::class, 'delete_category'])->name('delete-category');
Route::get('/view_products', [AdminController::class, 'view_products'])->name('view-products');
Route::post('/add_product', [AdminController::class, 'add_product'])->name('add-product');