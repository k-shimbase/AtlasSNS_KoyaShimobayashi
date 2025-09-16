<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UsersController extends Controller
{
    //━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
    // ◆検索画面の表示
    //━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
    public function search(Request $request){

        $searchText = $request->search_text;

        try {
            //◆検索結果のユーザ取得(Auth::id()は自身のIDを検索結果から除外する為の指定)
            $users = User::getSearchUser($searchText, Auth::id());

            //◆表示
            return view('users.search', ['users' => $users, 'search_text' => $searchText]);

        } catch (\Illuminate\Database\QueryException $e) {
            Log::error($e->getMessage());
        }
    }
}
