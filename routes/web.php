<?php

use App\Http\Controllers\AppointmentController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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
});

Route::group(['prefix' => '/admin'], function () {
    Route::get('/appointments', [AppointmentController::class, 'index']);
});
// Route::get('/{any}', function () {
//     return view('welcome');
// })->where('any', '.*');
