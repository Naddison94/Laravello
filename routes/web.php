<?php

use App\Http\Controllers\Post\PostsController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['admin'])->name('admin.dashboard');

Route::get('/profile/{id}', [ProfileController::class, 'show'])
    ->middleware(['auth'])
    ->name('profile');

Route::get('/profile/edit/{id}', [ProfileController::class, 'edit'])
    ->middleware(['auth'])
    ->name('profile.edit');

Route::post('/profile/update/{id}', [ProfileController::class, 'update'])
    ->middleware(['auth'])
    ->name('profile.update');

Route::get('/posts', [PostsController::class, 'index'])
    ->middleware(['auth'])
    ->name('posts');
