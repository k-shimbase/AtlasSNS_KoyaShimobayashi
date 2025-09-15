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
            @forEach ($users as $user)
                <img src="{{ asset('images/'. $user->icon_image) }}" class="rounded-circle" alt="ICON"><a href="/prifle/. {{ $user->id }}"></a></img>
            @endForEach
        </div>
    </div>

    <!--────────────────────────────────────-->
    <!--◆投稿表示エリア                     -->
    <!--────────────────────────────────────-->
    <div class="post-list">

        @foreach ($posts as $post)
        <!--◆ポストアイテム-->
        <div class="post-content">

            <!--◇アイコン-->
            <img src="{{ asset('images/' . $post->user->icon_image) }}" class="rounded-circle" alt="ICON"></img>

            <div class="post-text-content">
                <!--◇ユーザ名-->
                <p class="post-name">{{ $post->user->username }}</p>

                <!--◇投稿内容-->
                <p class="post-text">{!! nl2br(e($post->post)) !!}</p>
            </div>

            <!--◇日時-->
            <p class="post-date">{{ $post->created_at }}</p>

            <!--◇自分自身のポストであった際-->
            <div class="post-myself-content">
                @if (Auth::id() === $post->user->id)
                <p class="post-myself-item post-edit" data-post-id="{{ $post->id }}" data-bs-target="#postEditModal"></p>
                <p class="post-myself-item post-trash" data-post-id="{{ $post->id }}"></p>
                @endif
            </div>

        </div>
        @endforeach

    </div>

</x-login-layout>
