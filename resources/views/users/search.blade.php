<x-login-layout>

    <!--────────────────────────────────────-->
    <!--◆メインエリア(ユーザ検索欄エリア)     -->
    <!--────────────────────────────────────-->
    <form class="main-area search-main" action="" method="POST">
        @csrf

        <!--◆検索内容入力エリア-->
        <textarea class="form-control" name="search_text" placeholder="ユーザー名"></textarea>

        <!--◆検索ボタン-->
        <button type="submit" class="btn custom-blue-button"><i class="bi bi-search"></i></button>
    </form>

    <!--────────────────────────────────────-->
    <!--◆アカウント表示エリア                -->
    <!--────────────────────────────────────-->
    <div class="account-list">

        <!--◆アカウント1要素-->
        <div class="account-element">

            <!--◇アイコン-->
            <img src="{{ asset('images/icon3.png') }}" class="rounded-circle" alt="ICON"></img>

            <!--◇アカウント名-->
            <p>TEST</p>

            <!--◇フォロー/フォロー解除ボタン-->
            <p class="btn custom-lblue-button account-follows-btn"><a href="">フォローする</a></p>
        </div>



        <div class="account-element">

            <!--◇アイコン-->
            <img src="{{ asset('images/icon3.png') }}" class="rounded-circle" alt="ICON"></img>

            <!--◇アカウント名-->
            <p>TEST</p>

            <!--◇フォロー/フォロー解除ボタン-->
            <p class="btn custom-lblue-button account-follows-btn"><a href="">フォローする</a></p>
        </div>



        <div class="account-element">

            <!--◇アイコン-->
            <img src="{{ asset('images/icon3.png') }}" class="rounded-circle" alt="ICON"></img>

            <!--◇アカウント名-->
            <p>TEST</p>

            <!--◇フォロー/フォロー解除ボタン-->
            <p class="btn custom-lblue-button account-follows-btn"><a href="">フォローする</a></p>
        </div>

    </div>

</x-login-layout>
