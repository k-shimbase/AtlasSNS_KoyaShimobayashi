<x-logout-layout>
    <main>

        <section id="clear" class="form-content added-area">

            <div class="texts-box text-first">
                <p>{{ session('username') }}さん</p>
                <p>ようこそ! AtlasSNSへ</p>
            </div>

            <div class="texts-box text-second">
                <p>ユーザー登録が完了しました。</p>
                <p>早速ログインをしてみましょう。</p>
            </div>

            <p class="btn login-register-button to-login-button"><a href="login">ログイン画面へ</a></p>
        </section>

    </main>
</x-logout-layout>
