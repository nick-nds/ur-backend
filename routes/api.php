<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/posts', [\App\Http\Controllers\PostController::class, 'index']);
Route::get('/posts/{post}', [\App\Http\Controllers\PostController::class, 'show']);

Route::middleware(['auth:sanctum'])->get('/posts/user/{user}', [\App\Http\Controllers\PostController::class, 'user']);
