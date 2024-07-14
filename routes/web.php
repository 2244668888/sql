<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\PracticeController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');

Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show');

Route::get('/sales/create/{user}/{categoryId?}', [SaleController::class, 'create'])->name('sales.create');
Route::post('/sales/store', [SaleController::class, 'store'])->name('sales.store');

//Route::get('/product', [ProductsController::class, 'index'])->name('product');
//Route::post('/product/store', [ProductsController::class, 'store'])->name('store');
//Route::get('/product/list', [ProductsController::class, 'list'])->name('product.list');
//Route::get('/product/delete/{id}', [ProductsController::class, 'destroy'])->name('delete');
//Route::get('/product/edit/{id}', [ProductsController::class, 'edit'])->name('edit');
//Route::get('/product/view/{id}', [ProductsController::class, 'view'])->name('view');
//Route::put('/product/update/{id}', [ProductsController::class, 'update'])->name('update');

Route::get('/category', [CategoryController::class, 'index'])->name('category');
Route::get('/category/list', [CategoryController::class, 'list'])->name('category.list');
Route::post('/category/store', [CategoryController::class, 'store'])->name('category.store');
Route::get('/category/delete/{id}', [CategoryController::class, 'destroy'])->name('category.delete');
Route::get('/category/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
Route::get('/category/view/{id}', [CategoryController::class, 'view'])->name('category.view');
Route::put('/category/update/{id}', [CategoryController::class, 'update'])->name('categories.update');

Route::resource('products', ProductController::class);
Route::resource('practices', PracticeController::class);
