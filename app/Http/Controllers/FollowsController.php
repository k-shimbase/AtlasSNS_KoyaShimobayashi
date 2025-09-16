<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Post;

class FollowsController extends Controller
{
    //━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
    // ◆フォロー関連
    //━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
    //フォロー
    public function store(User $user)
    {
        //リレーション経由のattach/detachはLaravel側でテーブルへの操作を全て処理してくれる(例外処理含めて)/故にQueryExceptionは不必要
        Auth::user()->followings()->syncWithoutDetaching([$user->id]); //既にフォロー済みであったとしてもエラーが起きなくなる
        return back();
    }

    //フォロー解除
    public function cancel(User $user)
    {
        //リレーション経由のattach/detachはLaravel側でテーブルへの操作を全て処理してくれる(例外処理含めて)/故にQueryExceptionは不必要
        Auth::user()->followings()->detach($user->id);
        return back();
    }

    //━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
    // ◆フォローページ表示
    //━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
    public function followList(){

        try {

            //◇フォローしているユーザの取得
            $users = Auth::user()->followings()->get();

            //◇フォローユーザの投稿を全取得する
            $posts = Post::getPostForUsers($users);

            return view('follows.followList', ['users' => $users, 'posts' => $posts]);

        } catch (\Illuminate\Database\QueryException $e) {
            Log::error($e->getMessage());
        }
    }

    //━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
    // ◆フォロワーページ表示
    //━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
    public function followerList(){

        try {

            //◇自身をフォローしているユーザの取得
            $users = Auth::user()->followers()->get();

            //◇フォロワーユーザの投稿を全取得する
            $posts = Post::getPostForUsers($users);

            return view('follows.followerList', ['users' => $users, 'posts' => $posts]);

        } catch (\Illuminate\Database\QueryException $e) {
            Log::error($e->getMessage());
        }
    }
}
