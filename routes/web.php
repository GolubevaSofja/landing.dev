<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('frontend');
});

/*Route::get('/{vue_capture?}', function () {
    return view('welcome');
})->where('vue_capture', '[\/\w\.-]*');*/

Route::view('/cp', 'vendor.statamic.cp.index')->name('statamic.cp');


// Route::statamic('example', 'example-view', [
//    'title' => 'Example'
// ]);
