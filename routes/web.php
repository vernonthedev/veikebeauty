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
Route::get('/', [HomeController::class, 'index'])->name('home');

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
Route::get('/manage_new_product', [AdminController::class, 'view_products'])->name('view-products');
Route::post('/add_product', [AdminController::class, 'add_product'])->name('add-product');
Route::get('/all_products', [AdminController::class, 'show_products'])->name('show-products');
Route::get('/delete_product/{id}', [AdminController::class, 'delete_product'])->name('delete-product');
Route::get('/update_product/{id}', [AdminController::class, 'update_product'])->name('update-product');
Route::post('/update_product_confirm/{id}', [AdminController::class, 'update_product_confirm'])->name('update-product-confirm');
Route::get('/view-all-orders', [AdminController::class, 'view_orders'])->name('view-orders');
Route::get('/delivered-order/{id}', [AdminController::class, 'delivered_order'])->name('delivered');
Route::get('/print-order/{id}', [AdminController::class, 'print_order'])->name('print-pdf');
Route::get('/send-email/{id}', [AdminController::class, 'send_email'])->name('send-email');
Route::post('/send-user-email/{id}', [AdminController::class, 'send_user_email'])->name('send-user-email');

// User's Page Routes
Route::get('/search', [HomeController::class, 'product_search'])->name('product-search');
Route::get('/shop', [HomeController::class, 'shop'])->name('shop');
Route::get('/contact-us', [HomeController::class, 'contact_us'])->name('contact');
Route::get('/about-us', [HomeController::class, 'about_us'])->name('about');
Route::get('/frequently-asked-questions', [HomeController::class, 'faq'])->name('faq');
Route::get('/product-details/{id}', [HomeController::class, 'product_details'])->name('product_details');
Route::post('/add-to-cart/{id}', [HomeController::class, 'add_to_cart'])->name('add-to-cart');
Route::get('/cart-items', [HomeController::class, 'show_cart'])->name('show-cart');
Route::get('/remove-cart-item/{id}', [HomeController::class, 'remove_cart_item'])->name('remove-cart');
Route::get('/cash-order', [HomeController::class, 'cash_order'])->name('cash-order');