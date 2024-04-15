<?php

use App\Http\Controllers\Api\v1\UrlController;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::apiResource('/urls', UrlController::class)
        ->middleware(['auth:sanctum', 'abilities:url-manage']);
});
