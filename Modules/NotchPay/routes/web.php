<?php

use Illuminate\Support\Facades\Route;
use Modules\NotchPay\Http\Controllers\NotchPayController;

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
    Route::resource('notchpay', NotchPayController::class)->middleware(['auth', 'verified', \Illuminate\Foundation\Http\Middleware\HandlePrecognitiveRequests::class])->names('notchpay');
});