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

            //search_textキーが空ではない際
        if (!empty($searchText)) {
            $users = User::where('id', '!=', Auth::id())
                ->where('username', 'like', '%' . $searchText . '%')
                ->get();

            //search_textキーが空の際
        } else {
            $users = User::where('id', '!=', Auth::id())
                ->get();

        }

            //表示
        return view('users.search', ['users' => $users, 'search_text' => $searchText]);
    }
}
