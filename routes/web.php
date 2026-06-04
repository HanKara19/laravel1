<?php
use App\Http\Controllers\admin\AdminHomeController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\CategoryController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/greeting', function () {
    return 'Hello World';
});


Route::get('/home', [HomeController::class, 'index']);

Route::get('/admin', [AdminHomeController::class, 'index'])->name('admin');

Route::get('/admin/categories', [CategoryController::class, 'index'])->name('categories.index');

Route::get('/admin/categories/create', [CategoryController::class, 'create'])->name('categories.create');

Route::post('/admin/categories/store', [CategoryController::class, 'store'])->name('categories.store');

Route::get('/admin/categories/{category}', [CategoryController::class, 'show'])->name('categories.show');

Route::get('/admin/categories/{category}/edit', [CategoryController::class, 'edit'])->name('categories.edit');

Route::put('/admin/categories/{category}', [CategoryController::class, 'update'])->name('categories.update');

Route::delete('/admin/categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');