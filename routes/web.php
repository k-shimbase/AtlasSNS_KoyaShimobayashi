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
    //◆トップ
    Route::get('top', [PostsController::class, 'index'])->name('auth.home');
    Route::post('top', [PostsController::class, 'store'])->name('auth.posts');

    //◆既存ポスト編集
    Route::post('posts/modal-text', [PostsController::class, 'modalTextPut'])->name('auth.posts.modal-text');
    Route::post('posts/update', [PostsController::class, 'update'])->name('auth.posts.update');

    //◆既存ポスト削除
    Route::post('posts/trash', [PostsController::class, 'trash'])->name('auth.posts.trash');

    //◆プロフィール関連
    Route::get('profile', [ProfileController::class, 'profile'])->name('auth.profile');

    //◆検索
    Route::get('search', [UsersController::class, 'search'])->name('auth.search');

    //◆フォロー/フォロワー関連
    Route::get('follow-list', [FollowsController::class, 'followList'])->name('auth.follow-list');
    Route::get('follower-list', [FollowsController::class, 'followerList'])->name('auth.follower-list');

    Route::post('/follow/{user}', [FollowsController::class, 'store'])->name('auth.follow.store');
    Route::post('/unfollow/{user}', [FollowsController::class, 'cancel'])->name('auth.follow.cancel');
});
