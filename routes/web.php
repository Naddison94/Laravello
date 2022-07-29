<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\TaskController;
use App\Http\Controllers\Group\GroupController;
use App\Http\Controllers\Post\CommentController;
use App\Http\Controllers\Post\PostController;
use App\Http\Controllers\User\ProfileController;
use App\Http\Controllers\User\FriendController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return view('welcome');
});

require __DIR__.'/auth.php';


Route::get('inertia/home', function () {
    return Inertia::render('Home');
})->name('inertia.home');

Route::get('inertia/users', function () {
    sleep(2);
    return Inertia::render('Users');
})->name('inertia.users');

Route::get('inertia/settings', function () {
    return Inertia::render('Settings');
})->name('inertia.users');

Route::post('inertia/logout', function () {
    dd('Simulated logging out with inertia');
})->name('inertia.logout');


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
    Route::get('/profile/{owner_user_id}/friends', [ProfileController::class, 'friends'])->name('user.profile.friends');
    Route::get('/profile/{id}/comments', [ProfileController::class, 'comments'])->name('user.profile.comments');
    Route::get('/profile/{id}/posts', [ProfileController::class, 'posts'])->name('user.profile.posts');

    Route::get('/user/{owner_user_id}/add/{friend_user_id}', [FriendController::class, 'create'])->name('user.friend.create');
    Route::get('/user/{owner_user_id}/delete/{friend_user_id}', [FriendController::class, 'delete'])->name('user.friend.delete');

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

    // middleware to make sure you have access to the group?
    Route::get('/groups', [GroupController::class, 'index'])->name('group.index');
    Route::get('/group/{id}', [GroupController::class, 'show'])->name('group.show');

    // middleware for group owner
    // edit group
});


