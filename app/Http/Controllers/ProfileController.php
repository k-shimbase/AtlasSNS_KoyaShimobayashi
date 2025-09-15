<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

use App\Models\User;
use App\Models\Post;

class ProfileController extends Controller
{
    //━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
    // ◆プロフィール編集画面
    //━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
    public function profileEdit(){
        return view('profiles.profileEdit');
    }

    //━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
    // ◆プロフィール画面
    //━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
    public function profile($id){

        //ユーザの取得
        $user = User::find($id);

        //ポストの取得
        $posts = Post::where('user_id', $id)
            ->latest()
            ->get();

        //Viewの呼び出し
        return view('profiles.profile', ['user' => $user, 'posts' => $posts]);
    }
}
