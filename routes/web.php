<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\RedirectController;
use App\Http\Controllers\ShortUrlController;
use App\Http\Controllers\TokenController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])
    ->name('home');

Route::resource('/urls', ShortUrlController::class)->middleware('auth');

Route::controller(TokenController::class)->middleware('auth')->group(function () {
    Route::get('/tokens', 'index')->name('tokens.index');
    Route::post('/tokens/create', 'create')->name('tokens.create');
    Route::delete('/tokens/{tokenId}', 'destroy')->name('tokens.destroy');
});

require __DIR__.'/auth.php';

Route::get('/{urlKey}', RedirectController::class)
    ->whereAlphaNumeric('urlKey')->name('redirect.execute');

Auth::routes();
