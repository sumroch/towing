<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\TowingController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::post('/login', [AuthController::class, 'authentication']);

Route::prefix('public')->middleware(['auth:sanctum'])->group(function () {
    Route::get('/logout', [AuthController::class, 'logout']);
    Route::get('/me', [AuthController::class, 'me']);

    //supporting data
    Route::get('/data-store', [StoreController::class, 'dataStore']);
    Route::get('/data-towing', [TowingController::class, 'dataTowing']);
    Route::get('/data-driver', [UserController::class, 'dataDriver']);

    Route::get('/home', [HomeController::class, 'index']);
    Route::get('/calender', [HomeController::class, 'calender']); //belum di buat data Api
    Route::get('/store/{store_id}', [HomeController::class, 'orderList']);
    Route::get('/home-store', [HomeController::class, 'orderListStore']);

    Route::middleware(['role:store'])->group(function () {
        Route::put('/order/{order_id}', [OrderController::class, 'update']);
    });

    Route::middleware(['role:manager'])->group(function () {
        Route::put('/order-confirm/{order_id}', [OrderController::class, 'updateConfirm']);
    });

    Route::middleware(['role:manager|store'])->group(function () {
        Route::post('/order', [OrderController::class, 'store']);
        Route::get('/store-history', [HomeController::class, 'storeHistory']);
    });

    Route::middleware(['role:driver'])->group(function () {
        Route::get('/driver-order-list', [HomeController::class, 'driverOrderList']);
        Route::get('/driver-history', [HomeController::class, 'driverHistory']);
    });

    Route::middleware(['role:driver'])->group(function () {
        Route::put('/driver-order/{order_id}', [OrderController::class, 'updateOrderDriver']);
    });
});

Route::prefix('admin')->middleware(['auth:sanctum', 'role:manager|store'])->group(function () {
    Route::get('/data-role', [UserController::class, 'dataRole']);

    Route::get('/user', [UserController::class, 'index']);
    Route::post('/user', [UserController::class, 'store']);
    Route::put('/user/{id}', [UserController::class, 'update']);
    Route::delete('/user/{id}', [UserController::class, 'destroy']);
});
