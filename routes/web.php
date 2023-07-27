<?php

use App\Http\Controllers\AppointmentController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ItemController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => '/'], function () {
    Route::get('dashboard', [HomeController::class, 'dashboard'])->name('dashboard');
    Route::get('appointments', [HomeController::class, 'appointments'])->name('appointments');
    Route::get('orders', [HomeController::class, 'orders'])->name('orders');

    Route::group(['prefix' => 'invoices'], function () {
        Route::get('/', [HomeController::class, 'invoices'])->name('invoices');
        Route::get('/{invoice_id}', [HomeController::class, 'invoice'])->name('invoices.select');
    });

    Route::group(['prefix' => 'items'], function () {
        Route::get('', [HomeController::class, 'items'])->name('items');
        Route::post('', [ItemController::class, 'store'])->name('items.store');
        Route::get('{item}', [ItemController::class, 'item'])->name('items.select');
        Route::put('update/{item}', [ItemController::class, 'update'])->name('items.update');
        Route::patch('update/change-photo/{item}', [ItemController::class, 'changePhoto'])->name('items.change-photo');
        Route::delete('update/{item}', [ItemController::class, 'destroy'])->name('items.destroy');
    });
});

Route::group(['prefix' => '/admin'], function () {
    Route::group(['prefix' => '/appointments'], function () {
        Route::get('/', [AppointmentController::class, 'index']);
        Route::get('/store', [AppointmentController::class, 'store'])->name('appointment.store');
    });
});
// Route::get('/{any}', function () {
//     return view('welcome');
// })->where('any', '.*');
