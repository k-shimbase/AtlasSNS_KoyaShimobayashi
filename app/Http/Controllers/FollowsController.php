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
        Auth::user()->followings()->syncWithoutDetaching([$user->id]); //既にフォロー済みであったとしてもエラーが起きなくなる
        return back();
    }

    //フォロー解除
    public function cancel(User $user)
    {
        Auth::user()->followings()->detach($user->id);
        return back();
    }

    //━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
    // ◆フォローページ表示
    //━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
    public function followList(){

        //◇フォローしているユーザの取得
        $users = Auth::user()->followings()->get();

        //◇WHERE 'user_id' IN (m, m, l...) ORDER BY created_at DESC;
        $posts = Post::whereIn('user_id', $users->pluck('id'))
            ->latest()
            ->get();

        return view('follows.followList', ['users' => $users, 'posts' => $posts]);
    }

    //━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
    // ◆フォロワーページ表示
    //━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
    public function followerList(){

        //◇自身をフォローしているユーザの取得
        $users = Auth::user()->followers()->get();

        //◇WHERE 'user_id' IN (m, m, l...) ORDER BY created_at DESC;
        $posts = Post::whereIn('user_id', $users->pluck('id'))
            ->latest()
            ->get();

        return view('follows.followerList', ['users' => $users, 'posts' => $posts]);
    }
}
