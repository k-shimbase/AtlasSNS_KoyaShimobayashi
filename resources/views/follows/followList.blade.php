<x-login-layout>

    <main>

        <!--────────────────────────────────────-->
        <!--◆フォロー画面上部                   -->
        <!--────────────────────────────────────-->
        <section class="main_area follows_main">

            <!--◆Follow Listテキスト-->
            <div class="follows_text">
                <h3>Follow List</h3>
            </div>

            <!--◆投稿内容入力エリア-->
            <div class="follows_list">
                @forEach ($users as $user)
                    <a href="/profile/{{ $user->id }}"><img src="{{ asset('images/'. $user->icon_image) }}" class="rounded-circle" alt="ICON"></img></a>
                @endForEach
            </div>
        </section>

        <!--────────────────────────────────────-->
        <!--◆投稿表示エリア                     -->
        <!--────────────────────────────────────-->
        <section class="post_list">

            @foreach ($posts as $post)
            <!--◆ポストアイテム-->
            <div class="post_content">

                <!--◇アイコン-->
                <a href="/profile/{{ $post->user->id }}"><img src="{{ asset('images/' . $post->user->icon_image) }}" class="rounded-circle" alt="ICON"></img></a>

                <div class="post_text_content">
                    <!--◇ユーザ名-->
                    <p class="post_name">{{ $post->user->username }}</p>

                    <!--◇投稿内容-->
                    <p class="post_text">{!! nl2br(e($post->post)) !!}</p>
                </div>

                <!--◇日時-->
                <p class="post_date">{{ $post->created_at }}</p>

                <!--◇自分自身のポストであった際-->
                <div class="post_myself_content">
                    @if (Auth::id() === $post->user->id)
                    <p class="post_myself_item post_edit" data-post-id="{{ $post->id }}" data-bs-target="#postEditModal"></p>
                    <p class="post_myself_item post_trash" data-post-id="{{ $post->id }}"></p>
                    @endif
                </div>

            </div>
            @endforeach

        </section>
    </main>

</x-login-layout>
