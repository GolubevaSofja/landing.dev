<?php

use App\Http\Controllers\BlockController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


Route::get('/', [BlockController::class, 'show'])->name('welcome');

Route::get('/home', [BlockController::class, 'homeView'])
    ->middleware(['auth', 'verified'])
    ->name('homepage');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/blocks/{id}/edit', [BlockController::class, 'edit'])->name('blocks.edit');
Route::delete('/blocks/{id}', [BlockController::class, 'destroy'])->name('blocks.destroy');
Route::resource('blocks', BlockController::class);
Route::post('blocks/create', [BlockController::class, 'create']);
Route::post('blocks/{block}', [BlockController::class, 'update']);
