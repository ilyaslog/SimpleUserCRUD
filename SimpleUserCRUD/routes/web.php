<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    $posts = [];
    if (auth()->check()) {
        $posts = auth()->user()->UserPosts()->latest()->get();
    }
    return view('home', ['posts' => $posts]);
});
Route::get('/register', [UserController::class, 'register'])->name('register');

Route::post('/register', [UserController::class, 'register'])->name('register.post');

Route::post('/register', [UserController::class,'register']);

Route::post('/logout',[UserController::class,'logout']);Route::post('/logout',[UserController::class,'logout']);

Route::post('/login',[UserController::class,'login']);


Route::get('/Dashboard', [UserController::class,'index']);

Route::get('/Post-Page',function () {
    return view('Create_post');
})->name('Create_post');

Route::post('/Submit-Post', [PostController::class, 'createPost']);

Route::get('/edit-post/{post}', [PostController::class, 'showEditScreen']);

Route::put('/edit-post/{post}', [PostController::class, 'actuallyUpdatePost']);
Route::delete('/delete-post/{post}', [PostController::class, 'deletePost']);