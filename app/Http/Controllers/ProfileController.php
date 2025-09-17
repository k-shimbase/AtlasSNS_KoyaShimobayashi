<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Database\Eloquent\ModelNotFoundException;

use App\Models\User;
use App\Models\Post;

class ProfileController extends Controller
{
    //━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
    // ◆プロフィール編集画面更新処理(POST送信)
    //━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
    public function profileEdit(Request $request){

        try {

            //◆ログインユーザのusersテーブルレコードの取得
            $user = Auth::user();

            //◆バリデーションの実装
            $request->validate([
                'username' => 'required|min:2|max:12',
                'mail_address' => 'required|min:5|max:40|email|unique:users,email,' . $user->id,
                'password' => 'required|min:8|max:20|alpha_num|confirmed',
                'bio' => 'nullable|max:150',
                'icon_image' => 'nullable|file|mimes:jpg,png,gif,svg,bmp'
            ]);

            //◆更新指定
            $user->username = $request->username;
            $user->email = $request->mail_address;
            $user->password = Hash::make($request->password);

            //◇bioがリクエストに存在した際
            if ($request->filled('bio')) {
                $user->bio = $request->bio;
            }

            //◇アイコンファイルがリクエストに存在した際
            if ($request->hasFile('icon_image')) {
                $filename = $request->file('icon_image')->getClientOriginalName(); //画像のファイル名を取得
                $request->file('icon_image')->move(public_path('images'), $filename); //public配下のimagesフォルダへと移動
                $user->icon_image = $filename;
            }

            //◆更新実行
            $user->save();

            //◆トップへ遷移
            return redirect()->route('auth.home');

        } catch (\Illuminate\Database\QueryException $e) {
            echo $e->getMessage();
        }
    }

    //━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
    // ◆プロフィール編集画面の表示(GET送信)
    //━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
    public function showProfileEdit(){

        //◆ログインユーザのusersテーブルレコードの取得
        $user = Auth::user();

        //◆プロフィール編集画面を表示
        return view('profiles.profileEdit', ['user' => $user]);

    }

    //━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
    // ◆プロフィール画面
    //━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
    public function profile($id){

        try {
            //◇ユーザの取得
            $user = User::findOrFail($id);

            //◇投稿全取得
            $posts = Post::getPostForUniqueUser($user);

            //◇Viewの呼び出し
            return view('profiles.profile', ['user' => $user, 'posts' => $posts]);

        //◆存在しないidが指定された際にtopへと戻る(findOrFailで指定したものが存在しなかった際、ModelNotFoundExceptionを投げる)
        } catch (ModelNotFoundException $e) {
            return redirect()->route('auth.home');
        }
    }
}
