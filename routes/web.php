<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');



Route::group(['as' => 'app.', 'prefix' => 'app', 'middleware' => ['auth']], function () {
    Route::get('/posts', [PostController::class, 'index'])->name('post.index');
    Route::get('/posts/create', [PostController::class, 'create'])->name('post.create');
    Route::post('/posts/store', [PostController::class, 'store'])->name('post.store');
    Route::get('/posts/{id}', [PostController::class, 'show'])->name('post.show');
    Route::get('/posts/{id}/edit', [PostController::class, 'edit'])->name('post.edit');
    Route::put('/posts/{id}/update', [PostController::class, 'update'])->name('post.update');
    Route::delete('/posts/{id}/destroy', [PostController::class, 'destroy'])->name('post.destroy');
});
