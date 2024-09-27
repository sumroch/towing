<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/home', [HomeController::class, 'index'])->name('public.home');
Route::get('/home/{store_id}', [HomeController::class, 'orderList']);

Route::post('/login', [AuthController::class, 'authentication']);
Route::get('/logout', [AuthController::class, 'logout'])->middleware(['auth:sanctum']);
Route::get('/me', [AuthController::class, 'me'])->middleware(['auth:sanctum']);


Route::get('/meta-data-order', [OrderController::class, 'metaDataOrder'])->middleware(['auth:sanctum']);
Route::post('/order', [OrderController::class, 'store']);
Route::put('/order/{order_id}', [OrderController::class, 'update']);
Route::put('/order-confirm/{order_id}', [OrderController::class, 'updateConfirm']);
Route::get('/store-history/{store_id}', [HomeController::class, 'storeHistory']);

Route::get('/driver-order-list/{driver_id}', [HomeController::class, 'driverOrderList']);
Route::get('/driver-history/{driver_id}', [HomeController::class, 'driverHistory']);
Route::put('/driver-order/{order_id}', [OrderController::class, 'updateOrderDriver']);
