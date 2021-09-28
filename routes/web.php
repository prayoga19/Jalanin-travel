<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\SuccessController;
use App\Http\Controllers\Admin\TravelPackageController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\TransactionController;
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

Route::get('/', [HomeController::class, 'index'])
->name('home');


Route::get('/detail/{slug}', [DetailController::class, 'index'])
->name('detail');

//saat user menekan button join now akan diarahkan ke route chekout proses
Route::post('/checkout/{id}', [CheckoutController::class, 'process'])
->name('checkout_process')
->middleware(['auth', 'verified']);

//mengambil data dari chekout proses
Route::get('/checkout/{id}', [CheckoutController::class, 'index'])
->name('checkout')
->middleware(['auth', 'verified']);

//route ini berfunfsi menambah member baru dalam proses chekout
Route::post('/checkout/create/{detail_id}', [CheckoutController::class, 'create'])
->name('checkout-create')
->middleware(['auth', 'verified']);

//route ini berfungsi untuk menghapus baru dalam proses chekout
Route::get('/checkout/remove/{detail_id}', [CheckoutController::class, 'remove'])
->name('checkout-remove')
->middleware(['auth', 'verified']);


Route::get('/checkout/confirm/{id}', [CheckoutController::class, 'success'])
->name('checkout-success')
->middleware(['auth', 'verified']);



Route::prefix('admin')
    ->middleware('auth','admin')
    ->group(function() {
        Route::get('/', [DashboardController::class, 'index'])
        ->name('dashboard');
        
        Route::resource('travel-package', TravelPackageController::class);

        
        Route::resource('gallery', GalleryController::class);

        Route::resource('transaction', TransactionController::class);
        
        
        
        
    });

Auth::routes(['verify'=> 'true']);