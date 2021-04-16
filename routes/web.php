<?php

use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\TagsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


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

Route::get('/', [WelcomeController::class,'index'])->name('/');
Route::get('blog/post/{post}',[App\Http\Controllers\Blog\PostsController::class,'show'])->name('blog.show');
Route::get('blog/categories/{categories}',[App\Http\Controllers\Blog\PostsController::class,'category'])->name('blog.category');
Route::get('blog/tags/{tag}',[App\Http\Controllers\Blog\PostsController::class,'tag'])->name('blog.tag');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function () {

    Route::resource('categories', CategoriesController::class);

    Route::resource('tags', TagsController::class);

    Route::resource('posts', PostsController::class)->middleware('verifyCategoriesCount'); 

    Route::get('trashed-posts',[PostsController::class,'trashed'])->name('trashed-posts.index');

    Route::put('restore-post/{post}',[PostsController::class,'restore'])->name('restore-post');

    //User Router

    Route::get('users',[UserController::class,'index'])->name('users.index')->middleware('verifyIsAdmin');
    Route::get('users/profile',[UserController::class,'edit'])->name('user.profile');
    Route::put('users/profile/update',[UserController::class,'update'])->name('users.update-profile');
    Route::post('user/{user}/make-admin',[UserController::class,'makeAdmin'])->name('user.make-admin');

});
 