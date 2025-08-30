<x-login-layout>

    <!--────────────────────────────────────-->
    <!--◆メインエリア(フォロー画面上部)      -->
    <!--────────────────────────────────────-->
    <div class="main-area follows-main">

        <!--◆Follow Listテキスト-->
        <div class="follows-text">
            <h3>Follower List</h3>
        </div>

        <!--◆投稿内容入力エリア-->
        <div class="follows-list">
            @for($i = 1; $i <= 15; $i++)
                <img src="{{ asset('images/icon2.png') }}" class="rounded-circle" alt="ICON"></img>
            @endfor
        </div>
    </div>

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
