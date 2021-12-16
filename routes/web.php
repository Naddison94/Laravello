<?php

use App\Http\Controllers\Post\CommentController;
use App\Http\Controllers\Post\PostController;
use App\Http\Controllers\Profile\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

require __DIR__.'/auth.php';

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard.show');

    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->middleware(['admin'])->name('admin.dashboard.show');

    Route::get('/profile/{id}', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile/edit/{id}', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile/update/{id}', [ProfileController::class, 'update'])->name('profile.update');

    Route::get('/posts', [PostController::class, 'index'])->name('post.index');
    Route::get('/post/create', [PostController::class, 'create'])->name('post.create');
    Route::get('/post/{id}', [PostController::class, 'show'])->name('post.show');
    Route::post('/post/store', [PostController::class, 'store'])->name('post.store');
    Route::get('/post/edit/{id}', [PostController::class, 'edit'])->name('post.edit');
    Route::post('/post/update/{id}', [PostController::class, 'update'])->name('post.update');
    Route::get('/post/delete/{id}', [PostController::class, 'delete'])->name('post.delete');
    Route::post('/post/destroy/{id}', [PostController::class, 'destroy'])->name('post.destroy');

    Route::post('/post/{id}/comment/store', [CommentController::class, 's tore'])->name('comment.store');
    Route::get('/comment/delete/{id}', [CommentController::class, 'delete'])->name('comment.delete');
    Route::post('/comment/destroy/{id}', [CommentController::class, 'destroy'])->name('comment.destroy');
});


