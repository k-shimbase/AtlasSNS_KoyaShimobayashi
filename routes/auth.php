<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {

    //◆ログイン
    Route::get('login', [AuthenticatedSessionController::class, 'login'])->name('login');
    Route::post('login', [AuthenticatedSessionController::class, 'store']);

    //◆登録
    Route::get('register', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('register', [RegisteredUserController::class, 'store']);

    //◆登録完了画面
    Route::get('added', [RegisteredUserController::class, 'added'])->name('added');

});

Route::middleware('auth')->group(function () {

    //◆ログアウト
    Route::post('logout', [AuthenticatedSessionController::class, 'logout'])->name('logout');
});
