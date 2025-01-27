<?php

use App\Models\Link;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\LinkController;

Route::prefix('v1')->group(function () {
    Route::post('/links', [LinkController::class, 'store']);
    Route::get('/links', [LinkController::class, 'index']);
    Route::get('/{short}', [LinkController::class, 'redirect']);

});
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
