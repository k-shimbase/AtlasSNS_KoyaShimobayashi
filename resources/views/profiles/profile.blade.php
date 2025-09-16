<x-login-layout>

    <main>

        <!--────────────────────────────────────-->
        <!--◆プロフィールエリア                  -->
        <!--────────────────────────────────────-->
        <section class="main_area profile_main">

            <!--◇アイコン-->
            <img src="{{ asset('images/' . $user->icon_image) }}" class="rounded-circle" alt="ICON"></img>

            <div class="text_items">

                <!--◇name-->
                <div class="profile_texts">
                    <p class="text_subtitle">name</p>
                    <p class="text_value">{{ $user->username }}</p>
                </div>

                <!--◇bio-->
                <div class="profile_texts">
                    <p class="text_subtitle">bio</p>
                    <p class="text_value">{{ $user->bio }}</p>
                </div>
            </div>

            <!--◇リレーション経由でcontainsを利用することでフォロー中のユーザに$user->idが存在するか否かを調べる/また、自身以外のユーザである必要がある-->
            @if (Auth::user()->isFollowing($user) && Auth::id() !== $user->id)
                <form class="follows_form profile_follows" action="{{ route('auth.follow.cancel', ['user' => $user->id]) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn custom_red_button account_follows_btn">フォロー解除</button>
                </form>

            <!--◇自身以外のユーザの際-->
            @elseif (Auth::id() !== $user->id)
                <form class="follows_form profile_follows" action="{{ route('auth.follow.store', ['user' => $user->id]) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn custom_lblue_button account_follows_btn">フォローする</button>
                </form>
            @endif

        </section>

        <!--────────────────────────────────────-->
        <!--◆投稿表示エリア                     -->
        <!--────────────────────────────────────-->
        <section class="post_list">

            @foreach ($posts as $post)
            <!--◆ポストアイテム-->
            <div class="post_content">

                <!--◇アイコン-->
                <img src="{{ asset('images/' . $post->user->icon_image) }}" class="rounded-circle" alt="ICON"></img>

                <div class="post_text_content">
                    <!--◇ユーザ名-->
                    <p class="post_name">{{ $post->user->username }}</p>

                    <!--◇投稿内容-->
                    <p class="post_text">{!! nl2br(e($post->post)) !!}</p>
                </div>

                <!--◇日時-->
                <p class="post_date">{{ $post->created_at }}</p>

            </div>
            @endforeach

        </section>
    </main>

</x-login-layout>
