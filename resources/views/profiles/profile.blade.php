<x-login-layout>

    <!--────────────────────────────────────-->
    <!--◆メインエリア(投稿記入エリア)        -->
    <!--────────────────────────────────────-->
    <div class="main-area profile-main">
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
            <!--
            <div class="post-myself-content">
                @if (Auth::id() === $post->user->id)
                <p class="post-myself-item post-edit" data-post-id="{{ $post->id }}" data-bs-target="#postEditModal"></p>
                <p class="post-myself-item post-trash" data-post-id="{{ $post->id }}"></p>
                @endif
            </div>
            -->

        </div>
        @endforeach

    </div>

</x-login-layout>
