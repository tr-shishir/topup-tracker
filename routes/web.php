<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TopUpUserController;

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


Route::get('/', [TopUpUserController::class, 'index'])->name('topup-users.index');
Route::get('/topup-users-by-amount', [TopUpUserController::class, 'indexByAmount'])->name('topup-users.indexByAmount');
Route::get('/search', [TopUpUserController::class, 'search'])->name('topup-users.search');
Route::post('/calculate', [TopUpUserController::class, 'calculate'])->name('topup-users.calculate');
