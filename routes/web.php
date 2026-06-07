<?php
use App\Http\Controllers\admin\AdminHomeController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\AdminProductController;
use App\Http\Controllers\admin\AdminUserController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/greeting', function () {
    return 'Hello World';
});

/*
Route::get('/home', [HomeController::class, 'index']);

Route::get('/admin', [AdminHomeController::class, 'index'])->name('admin');

Route::get('/admin/categories', [CategoryController::class, 'index'])->name('admin.categories.index');

Route::get('/admin/categories/create', [CategoryController::class, 'create'])->name('admin.categories.create');

Route::post('/admin/categories/store', [CategoryController::class, 'store'])->name('admin.categories.store');

Route::get('/admin/categories/{category}', [CategoryController::class, 'show'])->name('admin.categories.show');

Route::get('/admin/categories/{category}/edit', [CategoryController::class, 'edit'])->name('admin.categories.edit');

Route::put('/admin/categories/{category}', [CategoryController::class, 'update'])->name('admin.categories.update');

Route::delete('/admin/categories/{category}', [CategoryController::class, 'destroy'])->name('admin.categories.destroy');

*/
Route::middleware(['auth', 'admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::get('/', [AdminHomeController::class, 'index'])->name('index');


Route::prefix('product')->name('product.')->controller(AdminProductController::class) ->group(function () {

            Route::get('/', 'index')->name('index');

            Route::get('/create', 'create')->name('create');

            Route::post('/store', 'store')->name('store');

            Route::get('/show/{product}', 'show')->name('show');

            Route::get('/edit/{product}', 'edit')->name('edit');

            Route::put('/update/{product}', 'update')->name('update');

            Route::delete('/delete/{product}', 'destroy')->name('destroy');
        });


// Category routes
Route::prefix('categories')->name('categories.')->controller(CategoryController::class)->group(function () {

        Route::get('/', 'index')->name('index');

        Route::get('/create', 'create')->name('create');

        Route::post('/store', 'store')->name('store');

        Route::get('/show/{category}', 'show')->name('show');

        Route::get('/edit/{category}', 'edit')->name('edit');

        Route::put('/update/{category}', 'update')->name('update');

        Route::delete('/delete/{category}', 'destroy')->name('destroy');
    });


// User routes
Route::prefix('users')->name('users.')->controller(AdminUserController::class)->group(function () {

    Route::get('/', 'index')->name('index');

    Route::get('/show/{user}', 'show')->name('show');

    Route::get('/edit/{user}', 'edit')->name('edit');

    Route::put('/update/{user}', 'update')->name('update');

    Route::delete('/delete/{user}', 'destroy')->name('destroy');
});




});

Route::get('/profile', function () {
    return view('profile.edit');
})->middleware('auth')->name('profile.edit');
Route::get('/dashboard', function () {
    return redirect()->route('admin.index');
})->middleware(['auth', 'admin'])->name('dashboard');
require __DIR__.'/auth.php';