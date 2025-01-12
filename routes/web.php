<?php

use App\Http\Controllers\JobController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Route;

Route::get('/', [JobController::class, 'index']);
Route::get('/search', SearchController::class);

Route::get('/tags/{tag:name}', TagController::class);

Route::get('/job/create', [JobController::class, 'create'])->middleware(['auth']);
Route::post('/jobs', [JobController::class, 'store'])->middleware(['auth']);

Route::middleware('guest')->group(function () {

    Route::get('/register', [RegisteredUserController::class, 'create']);
    Route::post('/register', [RegisteredUserController::class, 'store']);

    Route::get('/login', [SessionController::Class, 'create']);
    Route::post('/login', [SessionController::Class, 'store']);
});

Route::post('/logout', [SessionController::Class, 'destroy'])->middleware('auth');

