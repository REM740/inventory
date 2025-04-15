<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\CategoryController;

Route::middleware(['auth'])->group(function () {
Route::get('/items', [ItemController::class, 'index'])->name('items.index');
});

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/index', function () {
    return redirect('/items');
});

Route::get('/items/create', [ItemController::class, 'create'])->name('items.create');
Route::post('/items', [ItemController::class, 'store'])->name('items.store');

Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');

Route::resource('categories', \App\Http\Controllers\CategoryController::class);

Route::resource('items', ItemController::class);