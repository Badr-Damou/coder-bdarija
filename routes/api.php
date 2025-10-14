<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PlaylistController;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/ping', fn() => response()->json(['message' => 'API working']));
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');

Route::middleware(['auth:sanctum', 'role:admin'])->group(function () {
    Route::get('/test', fn() => response()->json(['message' => 'API test working']));
    Route::get('/admin-only', fn() => response()->json(['message' => 'Admin access granted']));
    Route::post('/playlist/create', [PlaylistController::class, 'storePlaylist']);
    Route::delete('/playlist/{id}', [PlaylistController::class, 'deletePlaylist']);
    Route::put('/playlist/{id}', [PlaylistController::class, 'updatePlaylist']);
    Route::get('/playlists', [PlaylistController::class, 'getPlaylists']);
    Route::get('/playlist/{id}', [PlaylistController::class, 'showPlaylist']);
    Route::post('/blog/create', [BlogController::class, 'storeBlog']);
    Route::delete('/blog/{id}', [BlogController::class, 'deleteBlog']);
    Route::put('/blog/{id}', [BlogController::class, 'updateBlog']);
    Route::get('/blogs', [BlogController::class, 'indexBlogs']);
    Route::get('/blog/{id}', [BlogController::class, 'showBlog']);
    Route::get('/categories', [CategoryController::class, 'getCategories']);
    Route::post('/category/create', [CategoryController::class, 'createCategory']);
    Route::delete('/category/{id}', [CategoryController::class, 'deleteCategory']);
    Route::put('category/{id}', [CategoryController::class, 'updateCategory']);
    Route::get('/category/{id}', [CategoryController::class, 'showCategory']);
    Route::post('/author/create', [AuthorController::class, 'storeAuthor']);
    Route::get('/authors', [AuthController::class, 'getAuthors']);
    Route::get('/author/{id}/show', [AuthorController::class, 'showAuthor']);
    Route::put('/author/{id}/update', [AuthorController::class, 'updateAuthor']);
    Route::delete('/author/{id}/delete', [AuthorController::class, 'deleteAuthor']);

});