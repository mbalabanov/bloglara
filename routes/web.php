<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;

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
    $userPosts = [];
    if(auth()->check()) {
        $userPosts = auth()->user()->userPosts()->latest()->get();
    }
    // $allPosts = Post::where('user_id', auth()->id())->get();
    return view('home', ['posts' => $userPosts]);
});

// User related routes
Route::post('/register', [UserController::class, 'register']);
Route::post('/login', [UserController::class, 'login']);
Route::post('/logout', [UserController::class, 'logout']);

// Blog post related routes
Route::post('/create-post', [PostController::class, 'ceatePost']);
Route::get('/edit-post/{post}', [PostController::class, 'showEditView']);
Route::put('/edit-post/{post}', [PostController::class, 'updatePost']);
Route::delete('/delete-post/{post}', [PostController::class, 'deletePost']);