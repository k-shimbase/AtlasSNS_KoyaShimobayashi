<x-login-layout>

    <!--────────────────────────────────────-->
    <!--◆メインエリア(ユーザ検索欄エリア)     -->
    <!--────────────────────────────────────-->
    <form class="main-area search-main" action="{{ route('auth.search') }}" method="GET">

        <!--◆検索内容入力エリア-->
        <textarea class="form-control" name="search_text" placeholder="ユーザー名"></textarea>

        <!--◆検索ボタン-->
        <button type="submit" class="btn custom-blue-button"><i class="bi bi-search"></i></button>

        <!--◆検索ワード-->
        @if (!empty($search_text))
            <p class="search-word">検索ワード：{{ $search_text }}</p>
        @endif
    </form>

    <!--────────────────────────────────────-->
    <!--◆アカウント表示エリア                -->
    <!--────────────────────────────────────-->
    <div class="account-list">

        @foreach ($users as $user)
        <!--◆アカウント1要素-->
        <div class="account-element">

            <!--◇アイコン-->
            <img src="{{ asset('images/'. $user->icon_image) }}" class="rounded-circle" alt="ICON"></img>

            <!--◇アカウント名-->
            <p>{{ $user->username }}</p>

            <!--◇フォロー/フォロー解除ボタン-->
            <!--◆ボタンの見た目修正必須！-->

            @if (Auth::user()->followings->contains($user->id))
                <form class="follows-form" action="{{ route('auth.follow.cancel', ['user' => $user->id]) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn custom-red-button account-follows-btn">フォロー解除</button>
                </form>
            @else
                <form class="follows-form" action="{{ route('auth.follow.store', ['user' => $user->id]) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn custom-lblue-button account-follows-btn">フォローする</button>
                </form>
            @endif

        </div>
        @endforeach

    </div>

</x-login-layout>
