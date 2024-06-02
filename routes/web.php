<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FJBController;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return view('welcome');
});


Route::middleware(['auth', 'check.auth'])->group(function () {
    Route::get('/dashboard', [FJBController::class, 'index'])->name('dashboard');
    Route::post('/buy', [FJBController::class, 'buy'])->name('buy');
    Route::post('/cancelOrder/{id}', [FJBController::class, 'cancelOrder'])->name('cancelOrder');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
