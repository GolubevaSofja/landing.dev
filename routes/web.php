<?php

use App\Http\Controllers\BackgroundController;
use App\Http\Controllers\BlockController;
use App\Http\Controllers\BlockTypeController;
use App\Http\Controllers\ButtonController;
use App\Http\Controllers\CarouselController;
use App\Http\Controllers\CenteredPictureBlockController;
use App\Http\Controllers\ColumnElementController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\DropdownBlockController;
use App\Http\Controllers\DropdownBlockElementController;
use App\Http\Controllers\FooterBlockController;
use App\Http\Controllers\HeadBlockController;
use App\Http\Controllers\HeadBlockElementController;
use App\Http\Controllers\HeadingBlockController;
use App\Http\Controllers\HeadingParagraphBlockController;
use App\Http\Controllers\ImageLinkController;
use App\Http\Controllers\ParagraphBlockController;
use App\Http\Controllers\ReviewBlockController;


use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

//Route::get('/home', [DashboardController::class, 'index'])
//    ->middleware(['auth', 'verified'])
//    ->name('homepage');

Route::get('/home', [BlockController::class, 'homeView'])
    ->middleware(['auth', 'verified'])
    ->name('homepage');

//Route::get('/home', function () {
//    return Inertia::render('HomePage');
//})->middleware(['auth', 'verified'])->name('homepage');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/blocks/{id}/edit', [BlockController::class, 'edit'])->name('blocks.edit');

Route::delete('/blocks/{id}', [BlockController::class, 'destroy'])->name('blocks.destroy');



Route::resource('backgrounds', BackgroundController::class);
Route::resource('blocks', BlockController::class);
Route::post('blocks/create', [BlockController::class, 'create']);
Route::resource('blockTypes', BlockTypeController::class);
Route::resource('buttons', ButtonController::class);
Route::resource('carousels', CarouselController::class);
Route::resource('columnElements', ColumnElementController::class);
Route::resource('centeredPictureBlocks', CenteredPictureBlockController::class);
Route::resource('companies', CompanyController::class);
Route::resource('dropdownBlocks', DropdownBlockController::class);
Route::resource('dropdownBlockElements', DropdownBlockElementController::class);
Route::resource('footerBlocks', FooterBlockController::class);
Route::resource('headBlocks', HeadBlockController::class);
Route::resource('headBlockElements', HeadBlockElementController::class);
Route::resource('headingBlocks', HeadingBlockController::class);
Route::resource('headingParagraphBlocks', HeadingParagraphBlockController::class);
Route::resource('imageLinks', ImageLinkController::class);
Route::resource('paragraphBlocks', ParagraphBlockController::class);
Route::resource('reviewBlocks', ReviewBlockController::class);
