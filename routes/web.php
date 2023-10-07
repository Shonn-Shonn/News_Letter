<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\Auth\RegisterController;
use App\Models\Post;
use App\Models\User;
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

Route::get('/posts', function () {
    return view('posts');
});

Route::get('post/{post}',[PostController::class,'getIndex'])->where('post','[A-z-\_]+');


Route::get('/users/{user}/posts/{post}', function (User $user, Post $post) {
    return $post;
})->scopeBindings();


Route::prefix('posting')->group(function () {
    Route::get('/show-bar-chart', [PostController::class, 'showBarChart']);
    Route::get('/show-post-collections', [PostController::class, 'showPostCollections']);
    Route::get('/create', [PostController::class,'createPost']);
    Route::post('/store', [PostController::class, 'storePost']);
    Route::get('/show-post-from-resources', [PostController::class, 'showPostFromResources']);
    Route::get('/like-post', [PostController::class, 'likePost']);
    Route::get('/unlike-post', [PostController::class, 'unlikePost']);
    Route::get('/save-post', [PostController::class, 'savePost']);
});

Route::prefix('author')->group(function() {
    Route::get('/create', [AuthorController::class, 'create']);
    Route::post('/store', [AuthorController::class, 'store']);
    Route::get('/edit', [AuthorController::class, 'edit']);
    Route::post('/update', [AuthorController::class, 'update']);
    Route::get('/delete', [AuthorController::class, 'delete']);
    Route::get('/show-author-list', [AuthorController::class, 'showAuthorList']);
    Route::get('/popular-authors', [AuthorController::class, 'popularAuthors']);
});

Route::prefix('auth')->group(function() {
    Route::get('/register', [RegisterController::class, 'create']);
});