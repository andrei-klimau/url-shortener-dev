<?php

use App\Http\Controllers\RedirectController;
use App\Http\Controllers\ShortUrlController;
use App\Http\Controllers\TokenController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
/*
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
*/
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('urls', ShortUrlController::class)->middleware('auth');

Route::controller(TokenController::class)->middleware('auth')->group(function () {
    Route::get('/tokens', 'index')->name('tokens.index');
    Route::post('/tokens/create', 'create')->name('tokens.create');
    Route::delete('/tokens/{tokenId}', 'destroy')->name('tokens.destroy');
});

require __DIR__.'/auth.php';

Route::get('/{urlKey}', RedirectController::class)
    ->whereAlphaNumeric('urlKey');

Auth::routes();
