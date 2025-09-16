<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
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
    public static function getPostForUsers($users) {

        //◇WHERE 'user_id' IN (m, m, l...) ORDER BY created_at DESC;
        //◇pluckはコレクションに対してのみ有効
        return Post::whereIn('user_id', $users->pluck('id'))
            ->latest()
            ->get();
    }

    //━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
    // ◆単体ユーザの投稿全取得
    //━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
    public static function getPostForUniqueUser($user) {

        //◇WHERE 'user_id' IN (m, m, l...) ORDER BY created_at DESC;
        //◇find想定(Userインスタンス)である為pluckは利用できない
        return Post::where('user_id', $user->id)
            ->latest()
            ->get();
    }
}
