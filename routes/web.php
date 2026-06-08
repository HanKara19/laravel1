<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;

use App\Http\Controllers\admin\AdminHomeController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\AdminProductController;
use App\Http\Controllers\admin\AdminUserController;
use App\Http\Controllers\admin\AdminOrderController;

/*
|--------------------------------------------------------------------------
| Frontend Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return redirect()->route('home');
});

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/products', [HomeController::class, 'products'])->name('products');

Route::get('/product/{id}', [HomeController::class, 'productDetail'])
    ->name('product.detail');

Route::get('/greeting', function () {
    return 'Hello World';
});

/*
|--------------------------------------------------------------------------
| Cart and Checkout Routes
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {

    Route::prefix('cart')->group(function () {

        Route::get('/', [CartController::class, 'index'])
            ->name('cart.index');

        Route::post('/add/{product}', [CartController::class, 'add'])
            ->name('cart.add');

        Route::post('/update/{cart}', [CartController::class, 'update'])
            ->name('cart.update');

        Route::delete('/remove/{cart}', [CartController::class, 'remove'])
            ->name('cart.remove');

        Route::get('/checkout', [CheckoutController::class, 'checkout'])
            ->name('checkout');

        Route::post('/place-order', [CheckoutController::class, 'placeOrder'])
            ->name('place.order');
    });
});

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::get('/', [AdminHomeController::class, 'index'])
            ->name('index');

        /*
        |--------------------------------------------------------------------------
        | Admin Preferences Users
        |--------------------------------------------------------------------------
        */

        Route::get('/preferences/users', [AdminUserController::class, 'preferences'])
            ->name('preferences.users');

        /*
        |--------------------------------------------------------------------------
        | Admin Product Routes
        |--------------------------------------------------------------------------
        */

        Route::prefix('product')
            ->name('product.')
            ->controller(AdminProductController::class)
            ->group(function () {

                Route::get('/', 'index')->name('index');

                Route::get('/create', 'create')->name('create');

                Route::post('/store', 'store')->name('store');

                Route::get('/show/{product}', 'show')->name('show');

                Route::get('/edit/{product}', 'edit')->name('edit');

                Route::put('/update/{product}', 'update')->name('update');

                Route::delete('/delete/{product}', 'destroy')->name('destroy');

                Route::delete('/image/delete/{image}', 'deleteImage')
                    ->name('image.delete');
            });

        /*
        |--------------------------------------------------------------------------
        | Admin Category Routes
        |--------------------------------------------------------------------------
        */

        Route::prefix('categories')
            ->name('categories.')
            ->controller(CategoryController::class)
            ->group(function () {

                Route::get('/', 'index')->name('index');

                Route::get('/create', 'create')->name('create');

                Route::post('/store', 'store')->name('store');

                Route::get('/show/{category}', 'show')->name('show');

                Route::get('/edit/{category}', 'edit')->name('edit');

                Route::put('/update/{category}', 'update')->name('update');

                Route::delete('/delete/{category}', 'destroy')->name('destroy');
            });

        /*
        |--------------------------------------------------------------------------
        | Admin User Routes
        |--------------------------------------------------------------------------
        */

        Route::prefix('users')
            ->name('users.')
            ->controller(AdminUserController::class)
            ->group(function () {

                Route::get('/', 'index')->name('index');

                Route::get('/show/{user}', 'show')->name('show');

                Route::get('/edit/{user}', 'edit')->name('edit');

                Route::put('/update/{user}', 'update')->name('update');

                Route::delete('/delete/{user}', 'destroy')->name('destroy');
            });

        /*
        |--------------------------------------------------------------------------
        | Admin Order Routes
        |--------------------------------------------------------------------------
        */

        Route::prefix('orders')
            ->name('orders.')
            ->controller(AdminOrderController::class)
            ->group(function () {

                Route::get('/', 'index')->name('index');

                Route::get('/show/{order}', 'show')->name('show');

                Route::put('/update/{order}', 'update')->name('update');

                Route::delete('/delete/{order}', 'destroy')->name('destroy');
            });
    });

/*
|--------------------------------------------------------------------------
| Profile / Dashboard Routes
|--------------------------------------------------------------------------
*/

Route::get('/profile', function () {
    return view('profile.edit');
})->middleware('auth')->name('profile.edit');

Route::get('/dashboard', function () {
    return redirect()->route('admin.index');
})->middleware(['auth', 'admin'])->name('dashboard');

/*
|--------------------------------------------------------------------------
| Auth Routes
|--------------------------------------------------------------------------
*/

require __DIR__ . '/auth.php';
