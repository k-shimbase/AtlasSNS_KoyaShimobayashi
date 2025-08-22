<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */

    public function store(Request $request): RedirectResponse
    {
        // ◆バリデーションの実装
        $request->validate([
            'username' => 'required|min:2|max:12',
            'email' => 'required|min:5|max:40|email|unique:users,email',
            'password' => 'required|min:8|max:20|alpha_num|confirmed',
        ]);

        // ◆ユーザの追加
        User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // ◆セッション登録
        session(['username' => $request->username]);

        // ◆addedのURLへリダイレクトする
        return redirect('added');
    }

    public function added(): View
    {
        return view('auth.added');
    }
}
