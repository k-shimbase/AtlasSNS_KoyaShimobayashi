<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Post;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    //◆変更許可カラム
    protected $fillable = [
        'username',
        'email',
        'password',
    ];

    //◆json形式でモデルを取得した際に秘匿するカラム
    protected $hidden = [
        'password',
        'remember_token',
    ];

    //━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
    // ◆フォロー/フォロワーリレーション
    //━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
    //フォローの多対多リレーション
    public function followings()
    {
        return $this->belongsToMany(User::class, 'follows', 'following_id', 'followed_id'); //第2引数カラムにて自身のIDでフィルターをかけるようなイメージ。フィルターをかけた後の第3引数カラムを取得している。attach等だと第2引数カラムに自身、第3引数カラムに相手のIDが入力される
    }

    //フォロワーの多対多リレーション
    public function followers()
    {
        return $this->belongsToMany(User::class, 'follows', 'followed_id', 'following_id');
    }

    //━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
    // ◆ポストリレーション
    //━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
    //ポストへのリレーション(Userモデル視点)
    public function posts()
    {
        return $this->hasMany(Post::class);
    }





    //数値カウント, チェック関連
    //━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
    // ◆フォロー数とフォロワー数の取得
    //━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
    public function followingsCount() {
        return $this->followings()->count();
    }

    public function followersCount() {
        return $this->followers()->count();
    }

    //━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
    // ◆フォローしているか否かの確認
    //━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
    public function isFollowing($user) {
        return $this->followings->contains($user->id);
    }





    //DB操作関連
    //━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
    // ◆フォローユーザ+自身の取得
    //━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
    public function getFollowAndOwnId() {

        //◇フォローしているユーザに加えて自身のidをorで条件に加味している
        //◇usersとfollowsのテーブルで同名のidカラムが二つある為、users.idで明示的に記述している
        return $this->followings()->orWhere('users.id', $this->id)->get();
    }

    //━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
    // ◆ユーザ検索
    //━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
    public static function getSearchUser($searchText, $loginUser) {

        //◇自身のidを除外する条件をクエリビルダで追加
        $query = self::where('id', '!=', $loginUser);

        //◇searchTextが空であった際、Like指定の条件をクエリビルダで追加
        if (!empty($searchText)) {
            $query->where('username', 'like', '%' . $searchText . '%');
        }

        //◇クエリビルダを実行して返す
        return $query->get();
    }
}
