<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/home', [HomeController::class, 'index'])->name('public.home');
Route::get('/home/{store_id}', [HomeController::class, 'orderList']);

Route::post('/order', [OrderController::class, 'store']);
Route::get('/store-history/{store_id}', [HomeController::class, 'storeHistory']);

Route::get('/driver-order-list/{driver_id}', [HomeController::class, 'driverOrderList']);
Route::get('/driver-history/{driver_id}', [HomeController::class, 'driverHistory']);
