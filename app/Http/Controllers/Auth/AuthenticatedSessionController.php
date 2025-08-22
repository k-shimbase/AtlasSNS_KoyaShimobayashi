<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {

        // ◆emailとpasswordが一致するレコードの有無の確認/ログイン処理
        $request->authenticate();

        // ◆セッションIDの再生成(ログインする度に変化する為セッションID固定攻撃を防ぐことが可能)
        $request->session()->regenerate();

        // ◆ログイン画面に遷移する前に表示していたページが存在する際はそのページへリダイレクト(存在しない際はtopへリダイレクト)
        return redirect()->intended('top');
    }

    public function logout(Request $request) {

        // ◆ログアウトする
        Auth::logout();

        // ◆セッションデータを完全に破棄する
        $request->session()->invalidate();

        // ◆ログインページへとリダイレクト
        return redirect('/login');
    }

}
