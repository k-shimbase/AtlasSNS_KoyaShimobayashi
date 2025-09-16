<x-logout-layout>
    <main>

        <section id="clear" class="form_content added_area">

            <div class="texts_box text_first">
                <p>{{ session('username') }}さん</p>
                <p>ようこそ! AtlasSNSへ</p>
            </div>

            <div class="texts_box text_second">
                <p>ユーザー登録が完了しました。</p>
                <p>早速ログインをしてみましょう。</p>
            </div>

            <p class="btn login_register_button to_login_button"><a href="login">ログイン画面へ</a></p>
        </section>

    </main>
</x-logout-layout>
