<x-login-layout>

    <!--────────────────────────────────────-->
    <!--◆メインエリア(投稿記入エリア)        -->
    <!--────────────────────────────────────-->
    <form class="main-area post-main" action="" method="POST">
        @csrf

        <!--◆アイコン-->
        <img src="{{ asset('images/icon1.png') }}" class="post-main-content rounded-circle" alt="ICON"></img>

        <!--◆投稿内容入力エリア-->
        <textarea class="post-main-content" name="post_text" placeholder="投稿内容を入力してください。"></textarea>

        <!--◆投稿ボタン-->
        <button type="submit" class="btn custom-blue-button post-main-content"><i class="bi bi-send"></i></button>
    </form>

    <!--────────────────────────────────────-->
    <!--◆投稿表示エリア                     -->
    <!--────────────────────────────────────-->
    <div class="post-list">

        <!--◆ポストアイテム-->
        <div class="post-content">

            <!--◇アイコン-->
            <img src="{{ asset('images/icon1.png') }}" class="rounded-circle" alt="ICON"></img>

            <div class="post-text-content">
                <!--◇ユーザ名-->
                <p class="post-name">name</p>

                <!--◇投稿内容-->
                <p class="post-text">投稿内容<br>1<br>2<br>3</p>
            </div>

            <!--◇日時-->
            <p class="post-date">2030-01-01 00:00</p>
        </div>

    </div>

</x-login-layout>
