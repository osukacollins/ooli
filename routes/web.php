<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UpvoteController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ExploreController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\DownvoteController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\CommunityController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\Auth\RegisterController;

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

Route::get('/', [LandingController::class, 'index'])->name('landing');

Route::get('/settings/{user:username}', [SettingsController::class, 'index'])->name('settings');
Route::post('/settings/{user}', [SettingsController::class, 'store']);

Route::get('/profile/{user:username}', [UserProfileController::class, 'index'])->name('profile');

Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store']);

Route::get('/logout', [LogoutController::class, 'store'])->name('logout');

Route::get('/community', [CommunityController::class, 'index'])->name('community');
Route::post('/community', [CommunityController::class, 'store']);
Route::put('/community', [CommunityController::class, 'join']);

Route::get('/community/{community}', [CommunityController::class, 'show'])->name('community.show');

Route::get('/home', [PostController::class, 'index'])->name('home');
Route::post('/home', [PostController::class, 'store']);

Route::delete('/posts/{post}/delete', [PostController::class, 'destroy'])->name('post.destroy');

Route::post('/posts/{post}/upvote', [UpvoteController::class, 'store'])->name('upvote');
Route::delete('/posts/{post}/upvote', [UpvoteController::class, 'destroy'])->name('upvote.destroy');

Route::post('/posts/{post}/downvote', [DownvoteController::class, 'store'])->name('downvote');
Route::delete('/posts/{post}/downvote', [DownvoteController::class, 'destroy'])->name('downvote.destroy');

Route::get('/post/{post}/comments', [CommentController::class, 'index'])->name('post.comments');
Route::post('/post/{post}/comments', [CommentController::class, 'store']);

Route::delete('/comment/{comment}/delete', [CommentController::class, 'destroy'])->name('comment.destroy');

Route::get('/explore', [ExploreController::class, 'index'])->name('explore');

Route::get('/explore/search', [ExploreController::class, 'search'])->name('search');

Route::get('/notifications/{user:username}', [NotificationController::class, 'index'])->name('notifications');
