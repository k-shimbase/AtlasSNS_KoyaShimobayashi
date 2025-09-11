<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    //検索ページを表示する
    public function search(){
        return view('users.search');
    }
}
