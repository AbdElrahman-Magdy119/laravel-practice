<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CommentController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
// posts
//Route::get('/posts', [PostController::class, "index"])->name('post');
//Route::get('/posts/create', [PostController::class, "create"])->name('post.create');
//Route::get('/posts/{id}', [PostController::class, "show"])->name('post.show');
//Route::post('/posts', [PostController::class, "store"])->name('post.store');
//Route::get('/posts/edit/{id}', [PostController::class, "edit"])->name('post.edit');
//Route::put('/posts/{id}', [PostController::class, "update"])->name('post.update');
//Route::delete('/posts/{id}', [PostController::class, "destroy"])->name('post.destroy');


Route::get('/posts/delete', [PostController::class, 'deletetwoYearsAgo'])->name('posts.deletetwoYearsAgo');


Route::resource('posts',PostController::class);
// users
Route::get('/users', [UserController::class, "index"])->name('user.index');
Route::get('/users/{user}', [UserController::class, "show"])->name('users.show');

// Articles

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::resource('comments',CommentController::class);