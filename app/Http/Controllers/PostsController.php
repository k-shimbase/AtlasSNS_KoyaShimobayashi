<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Post;

class PostsController extends Controller
{
    //━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
    // ◆トップ画面の表示
    //━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
    public function index(){

        //◇フォローしているユーザのidの取得(かつ自分自身のidも配列へと格納する)
        //◇usersとfollowsで同名のidカラムが二つある為、users.idで明示的に記述している
        $users = Auth::user()->followings()->pluck('users.id')->toArray(); //配列で取得[n, m, l]など
        $users[] = Auth::id();

        //◇WHERE 'user_id' IN (m, m, l...) ORDER BY created_at DESC;
        $posts = Post::whereIn('user_id', $users)
            ->latest()
            ->get();

        //◇表示(posts変数の引継ぎ)
        return view('posts.index', ['posts' => $posts]);
    }

    //━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
    // ◆ポスト投稿処理
    //━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
    public function store(Request $request){

        //◇バリデーション設定
        $request->validate([
            'post_text' => 'required|max:150',
        ]);

        //◇ポスト記録(insert)
        Post::create([
            'user_id' => auth()->id(),
            'post' => $request->post_text,
        ]);

        //◇リダイレクト
        return redirect()->route('auth.home');
    }

    //━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
    // ◆モーダルテキスト表示(非同期処理へと値を返す)
    //━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
    public function modalTextPut(Request $request) {

        //◇pri key(id)の値で探す
        $post = Post::find($request->post_id);

        //◇json形式でpostを返す('変数名' => $postオブジェクト->カラム名)
        return response()->json([
            'post' => $post->post,
        ]);
    }

    //━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
    // ◆ポスト更新
    //━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
    public function update(Request $request) {

        //◇pri key(id)の値で探す
        $post = Post::find($request->post_id);

        //◇バリデーション設定
        $request->validate([
            'post_text' => 'required|max:150',
        ]);

        //◇更新
        $post->post = $request->post_text;
        $post->save();

        //◇json形式でpostを返す('変数名' => $postオブジェクト->カラム名)
        return redirect()->route('auth.home');
    }

    //━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
    // ◆ポスト削除
    //━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
    public function trash(Request $request) {

        //◇pri key(id)の値で探す
        $post = Post::find($request->post_id);

        //◇削除
        $post->delete();

        //◇リダイレクト
        return redirect()->route('auth.home');
    }
}
