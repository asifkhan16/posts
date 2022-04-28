<?php

use App\Http\Controllers\AjaxController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostLikeController;
use App\Http\Controllers\UserPostController;

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
    return view('home');
})->name('home');

// Route::post('/ajax', function () {
//     return 'i am working';
// })->name('ajax.store');

///  Ajax Practice 
Route::get('/ajax', [AjaxController::class, 'index'])->name('ajax');
Route::get('/fromajax', [AjaxController::class, 'getdata']);
Route::post('/ajax', [AjaxController::class, 'store'])->name('ajax');
Route::post('/ajax/{id}', [AjaxController::class, 'update']);
Route::get('/ajax/{id}', [AjaxController::class, 'edit'])->name('ajax');
Route::Delete('/ajax/{id}', [AjaxController::class, 'destroy'])->name('ajax');

Route::get('/dashboard', [DashboardController::class,  'index'])->name('dashboard');

Route::get('/users/{user:username}/posts', [UserPostController::class,  'index'])->name('users.posts');

Route::get('/login',           [LoginController::class,    'index'])->name('login');
Route::Post('/login',          [LoginController::class,    'store'])->name('login');

Route::post('/logout',         [LogoutController::class,   'store'])->name('logout');

Route::get('/register',        [RegisterController::class, 'index'])->name('register');
Route::post('/register',       [RegisterController::class, 'store'])->name('register');

Route::get('/posts',           [PostController::class,     'index'])->name('posts');
Route::Post('/posts',          [PostController::class,     'store'])->name('posts');
// Route::get('/posts/{post}',   [PostController::class,     'show'])->name('post.show');
Route::delete('/posts/{post}', [PostController::class,     'destroy'])->name('posts.destroy');

Route::Post('/posts/{post}/likes',     [PostLikeController::class,       'store'])->name('posts.like');
// Route::Post('/posts/{id}/likes',     [PostLikeController::class,       'likepost'])->name('posts.likes');
Route::Delete('/posts/{post}/unlikes', [PostLikeController::class,       'destroy'])->name('posts.unlike');
