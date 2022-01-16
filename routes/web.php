<?php

use App\Http\Controllers\BasketController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserController;

Auth::routes([
    'reset'=>false,
    'confirm'=>false,
    'verify'=>false,
]);
Route::middleware(['auth'])->group(function(){

    Route::group(['prefix'=>'user'], function(){
        Route::get('/orders', [UserController::class, 'orders'])->name('user-orders');
        Route::get('/orders/{order}', [UserController::class, 'show'])->name('user-show');
    });
    Route::group(['middleware'=>'is_admin', 'prefix'=>'admin'], function(){
        Route::get('/orders', [OrderController::class, 'orders'])->name('orders');
        Route::get('/orders/{order}', [OrderController::class, 'show'])->name('show');
    });
});

Route::get('/', [MainController::class, 'index'])->name('index');
Route::get('/logout', [LoginController::class, 'logout'])->name('get-logout');
Route::get('/product', [MainController::class, 'product'])->name('product');
/*Route::get('/product/add', [MainController::class, 'product'])->name('product-add');
Route::get('/product/remove', [MainController::class, 'product'])->name('product-remove');
Route::get('/product/edit', [MainController::class, 'product'])->name('product-edit');
*/
Route::group(['prefix'=>'basket'], function(){
    
    Route::post('/add/{id}', [BasketController::class, 'basketAdd'])->name('basket-add');
    
    Route::group(['middleware'=>'basket_not_empty'], function(){
        Route::get('/', [BasketController::class, 'basket'])->name('basket');
        Route::get('/place', [BasketController::class, 'basketPlace'])->name('basket-place');
        Route::post('/remove/{id}', [BasketController::class, 'basketRemove'])->name('basket-remove');
        Route::post('/confirm', [BasketController::class, 'basketConfirm'])->name('basket-confirm');
    });
});