<?php

use App\Http\Controllers\Admin\{CarController, DepartureController, PassangerController};
use App\Http\Controllers\User\HomeController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->group(function(){
    Route::prefix('car')->group(function(){
        Route::get('/', [CarController::class, 'index'])->name('admin.car.index');
        Route::get('create', [CarController::class, 'create'])->name('admin.car.create');
        Route::post('create', [CarController::class, 'store']);
        Route::get('{id}/edit', [CarController::class, 'edit'])->name('admin.car.edit');
        Route::put('{id}/edit', [CarController::class, 'update']);
        Route::get('{id}/delete', [CarController::class, 'delete'])->name('admin.car.delete');
    });

    Route::prefix('departure')->group(function(){
        Route::get('/', [DepartureController::class, 'index'])->name('admin.departure.index');
        Route::get('create', [DepartureCOntroller::class, 'create'])->name('admin.departure.create');
        Route::post('create', [DepartureCOntroller::class, 'store']);
        Route::get('{id}/edit', [DepartureCOntroller::class, 'edit'])->name('admin.departure.edit');
        Route::put('{id}/edit', [DepartureCOntroller::class, 'update']);
        Route::get('{id}/delete', [DepartureCOntroller::class, 'delete'])->name('admin.departure.delete');
    });

    Route::get('passanger', [PassangerController::class, 'index'])->name('admin.passanger.index');
});



Route::get('/{orderId?}', [HomeController::class, 'home'])->name('user.home');
Route::get('/bus', [HomeController::class, 'bus'])->name('user.bus');
Route::post('/bus', [HomeController::class, 'bus_search'])->name('user.bus');
Route::post('/bus/detail', [HomeController::class, 'detail'])->name('user.bus.detail');
Route::post('/order', [HomeController::class, 'order'])->name('user.order');
Route::get('/tiket/{id}', [HomeController::class, 'tiket'])->name('user.tiket');

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
