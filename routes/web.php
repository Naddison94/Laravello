<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\Task\TaskController;
use App\Http\Controllers\Post\CommentController;
use App\Http\Controllers\Post\PostController;
use App\Http\Controllers\User\ProfileController;
use App\Http\Controllers\User\FriendController;
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

    Route::middleware(['admin'])->group(function () {
        Route::get('/admin/dashboard', [DashboardController::class, 'show'])->name('admin.dashboard.show');

        Route::get('/admin/tasks', [TaskController::class, 'index'])->name('admin.task.index');
        Route::get('/admin/task/create', [TaskController::class, 'create'])->name('admin.task.create');
        Route::post('/admin/task/store', [TaskController::class, 'store'])->name('admin.task.store');
        Route::get('/admin/task/edit/{id}', [TaskController::class, 'edit'])->name('admin.task.edit');
        Route::post('/admin/task/update/{id}', [TaskController::class, 'update'])->name('admin.task.update');
        Route::get('/admin/task/delete/{id}', [TaskController::class, 'delete'])->name('admin.task.delete');
        Route::post('/admin/task/destroy/{id}', [TaskController::class, 'destroy'])->name('admin.task.destroy');
    });

    Route::get('/profile/{id}', [ProfileController::class, 'show'])->name('user.profile.show');
    Route::get('/profile/edit/{id}', [ProfileController::class, 'edit'])->name('user.profile.edit');
    Route::post('/profile/update/{id}', [ProfileController::class, 'update'])->name('user.profile.update');

    Route::get('/user/{owner_user_id}/friends', [FriendController::class, 'index'])->name('user.friend.index');
    Route::get('/user/{owner_user_id}/add/{friend_user_id}', [FriendController::class, 'create'])->name('user.friend.create');
    Route::post('/user/{owner_user_id}/update/{friend_user_id}', [FriendController::class, 'update'])->name('user.friend.update');
    Route::get('/user/{owner_user_id}/delete/{friend_user_id}', [FriendController::class, 'delete'])->name('user.friend.delete');
    Route::get('/user/{owner_user_id}/destroy/{friend_user_id}', [FriendController::class, 'destroy'])->name('user.friend.destroy');

    Route::get('/posts', [PostController::class, 'index'])->name('post.index');
    Route::get('/post/create', [PostController::class, 'create'])->name('post.create');
    Route::get('/post/{id}', [PostController::class, 'show'])->name('post.show');
    Route::post('/post/store', [PostController::class, 'store'])->name('post.store');
    Route::get('/post/edit/{id}', [PostController::class, 'edit'])->name('post.edit');
    Route::post('/post/update/{id}', [PostController::class, 'update'])->name('post.update');
    Route::get('/post/delete/{id}', [PostController::class, 'delete'])->name('post.delete');
    Route::post('/post/destroy/{id}', [PostController::class, 'destroy'])->name('post.destroy');

    Route::post('/post/{id}/comment/store', [CommentController::class, 'store'])->name('post.comment.store');
    Route::post('/comment/{id}/reply', [CommentController::class, 'reply'])->name('post.comment.reply');
    Route::get('/comment/delete/{id}', [CommentController::class, 'delete'])->name('post.comment.delete');
    Route::post('/comment/destroy/{id}', [CommentController::class, 'destroy'])->name('post.comment.destroy');
});


