<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use App\Models\User;

class Post extends Model
{
    use HasFactory;

    //◆更新許可
    protected $fillable = [
        'user_id',
        'post',
    ];

    //━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
    // ◆ユーザリレーション
    //━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
    public function user()
    {
        //ユーザへのリレーション(Postモデル視点)
        return $this->belongsTo(User::class);
    }




    //DB操作関連
    //━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
    // ◆複数ユーザの投稿全取得
    //━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
    public static function getPostForUsers($usersOrIds) {

        //◇配列だった際はそのまま配列として定義する
        if (is_array($usersOrIds)) {
            $userIds = $usersOrIds;

        //◇インスタンスであった際は配列化する
        } else {
            $userIds = $usersOrIds->pluck('id')->toArray();
        }

        //◇配列としてWHERE INで処理
        return Post::whereIn('user_id', $userIds)
            ->latest()
            ->get();
    }

    //━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
    // ◆単体ユーザの投稿全取得
    //━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
    public static function getPostForUniqueUser($user) {

        //◇find想定(Userインスタンス)
        //◇getPostForUsersのようにpluckを指定してしまうと想定外の挙動をする(pluckはコレクション専用でありfindは単一Userインスタンスを取得する為対象外。故に単体と複数で関数を別けている)
        return Post::where('user_id', $user->id)
            ->latest()
            ->get();
    }
}
