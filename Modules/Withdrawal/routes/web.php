<?php

use Illuminate\Support\Facades\Route;
use Modules\Withdrawal\Http\Controllers\WithdrawalController;

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

Route::group([], function () {
    Route::resource('withdrawal', WithdrawalController::class)->middleware(['auth', 'verified'])->names('withdrawal');
    Route::resource('recipients', \Modules\Withdrawal\Http\Controllers\RecipientsController::class)->middleware(['auth', 'verified', 'password.confirm'])->names('recipients');
});
