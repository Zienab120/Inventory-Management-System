<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CustomerController;
Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/add-product', function () {
    return view('Admin.add_product');
})->middleware(['auth'])->name('add.product');

Route::get('/all-customers',[CustomerController::class,'index'])->middleware(['auth'])->name('all.customers');


Route::get('/all-product',[ProductController::class, 'index'])->middleware(['auth'])->name('all.product');

Route::delete('/product/{product}',[ProductController::class, 'destroy'])->middleware(['auth'])->name('delete.product');

Route::post('/insert-product',[ProductController::class,'store'])->middleware(['auth']);

Route::get('/product/{product}/edit-product',[ProductController::class,'edit'])->middleware(['auth'])->name('edit.product');

Route::post('/product/{product}/update-product',[ProductController::class,'update'])->middleware(['auth'])->name('update.product');

// Route::get('/edit-product', function () {
//     return view('Admin.edit_product');
// })->middleware(['auth'])->name('add.product');

// Route::post('/update-product',[ProductController::class,'update'])->middleware(['auth']);

Route::post('/insert-customer',[CustomerController::class,'store'])->middleware(['auth']);

Route::get('/sold-products',[InvoiceController::class,'soldProducts'])->middleware(['auth'])->name('sold.products');

Route::get('/available-products',[ProductController::class,'availableProducts'])->middleware(['auth'])->name('available.products');

Route::get('/pending-orders',[OrderController::class,'pendingOrders'])->middleware(['auth'])->name('pending.orders');

Route::get('/new-order', [OrderController::class,'newformData'])->middleware(['auth'])->name('new.order');

Route::get('/all-orders',[OrderController::class,'index'])->middleware(['auth'])->name('all.orders');

Route::get('/delivered-orders',[OrderController::class,'deliveredOrders'])->middleware(['auth'])->name('delivered.orders');

Route::get('/new-invoice', [InvoiceController::class,'newformData'])->middleware(['auth'])->name('new.invoice');

Route::get('/all-invoice', [InvoiceController::class,'index'])->middleware(['auth'])->name('all.invoices');

Route::get('/all-customers',[CustomerController::class,'index'])->middleware(['auth'])->name('all.customers');

Route::get('/add-customer', function () {
    return view('Admin.add_customer');
})->middleware(['auth'])->name('add.customer');


require __DIR__.'/auth.php';