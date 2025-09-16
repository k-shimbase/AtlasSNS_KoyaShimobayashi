<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;

class PostsController extends Controller
{
    //━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
    // ◆トップ画面の表示
    //━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
    public function index(){

        try {
            //◇フォローしているユーザ+自身のユーザの取得
            $userIds = Auth::user()->getFollowAndOwnId();

            //◇投稿を全取得する
            $posts = Post::getPostForUsers($userIds);

            //◇表示(posts変数の引継ぎ)
            return view('posts.index', ['posts' => $posts]);

        } catch (\Illuminate\Database\QueryException $e) {
            Log::error($e->getMessage());
        }
    }

    //━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
    // ◆ポスト投稿処理
    //━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
    public function store(Request $request){

        //◇バリデーション設定
        $request->validate([
            'post_text' => 'required|max:150',
        ]);

        try {
            //◇ポスト記録(insert)
            Post::create([
                'user_id' => auth()->id(),
                'post' => $request->post_text,
            ]);

            //◇リダイレクト
            return redirect()->route('auth.home');

        } catch (\Illuminate\Database\QueryException $e) {
            Log::error($e->getMessage());
        }
    }

    //━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
    // ◆モーダルテキスト表示(非同期処理へと値を返す)
    //━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
    public function modalTextPut(Request $request) {

        try {
            //◇pri key(id)の値で探す
            $post = Post::find($request->post_id);

            //◇json形式でpostを返す('変数名' => $postオブジェクト->カラム名)
            return response()->json([
                'post' => $post->post,
            ]);

        } catch (\Illuminate\Database\QueryException $e) {
            Log::error($e->getMessage());
        }
    }

    //━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
    // ◆ポスト更新
    //━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
    public function update(Request $request) {

        try {
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

        } catch (\Illuminate\Database\QueryException $e) {
            Log::error($e->getMessage());
        }
    }

    //━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
    // ◆ポスト削除
    //━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
    public function trash(Request $request) {

        try {
            //◇pri key(id)の値で探す
            $post = Post::find($request->post_id);

            //◇削除
            $post->delete();

            //◇リダイレクト
            return redirect()->route('auth.home');

        } catch (\Illuminate\Database\QueryException $e) {
            Log::error($e->getMessage());
        }
    }
}
