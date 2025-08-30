<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\FollowsController;
use Illuminate\Support\Facades\Route;

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



require __DIR__ . '/auth.php';

Route::middleware('auth')->group(function () {
    Route::get('top', [PostsController::class, 'index'])->name('auth.home');

    Route::get('profile', [ProfileController::class, 'profile'])->name('auth.profile');

    Route::get('search', [UsersController::class, 'search'])->name('auth.search');

    Route::get('follow-list', [FollowsController::class, 'followList'])->name('auth.follow-list');
    Route::get('follower-list', [FollowsController::class, 'followerList'])->name('auth.follower-list');
});
