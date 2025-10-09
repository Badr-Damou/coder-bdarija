<?php 

use Illuminate\Support\Facades\Route;

Route::get('/ping', fn() => response()->json(['message' => 'API working']));

Route::middleware(['auth:sanctum', 'role:admin'])->group(function () {
    Route::get('/test', fn() => response()->json(['message' => 'API test working']));
});