<?php

use App\Domain\MasterData\Entities\Group;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GroupController;
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
    Route::get('/calender', [HomeController::class, 'calender']);
    Route::get('/store/{store_id}', [HomeController::class, 'orderList']);
    Route::get('/home-store', [HomeController::class, 'orderListStore']);

    Route::middleware(['role:manager'])->group(function () {
        Route::get('/order/{order_id}', [OrderController::class, 'showOrderManager']);
        Route::put('/order-confirm/{order_id}', [OrderController::class, 'updateConfirm']);
    });

    Route::middleware(['role:store'])->group(function () {
        Route::put('/order/{order_id}', [OrderController::class, 'update']);
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

    Route::get('/store', [StoreController::class, 'index']);
    Route::post('/store', [StoreController::class, 'store']);
    Route::put('/store/{id}', [StoreController::class, 'update']);
    Route::delete('/store/{id}', [StoreController::class, 'delete']);

    Route::get('/towing', [TowingController::class, 'index']);
    Route::post('/towing', [TowingController::class, 'store']);
    Route::put('/towing/{id}', [TowingController::class, 'update']);
    Route::delete('/towing/{id}', [TowingController::class, 'delete']);

    Route::get('/group', [GroupController::class, 'index']);
    Route::post('/group', [GroupController::class, 'store']);
    Route::put('/group/{id}', [GroupController::class, 'update']);
    Route::delete('/group/{id}', [GroupController::class, 'delete']);
});