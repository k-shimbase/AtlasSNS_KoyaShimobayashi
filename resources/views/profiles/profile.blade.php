<x-login-layout>

    <main>

        <!--────────────────────────────────────-->
        <!--◆プロフィールエリア                  -->
        <!--────────────────────────────────────-->
        <section class="main-area profile-main">

            <!--◇アイコン-->
            <img src="{{ asset('images/' . $user->icon_image) }}" class="rounded-circle" alt="ICON"></img>

            <div class="text-items">

                <!--◇name-->
                <div class="profile-texts">
                    <p class="text-subtitle">name</p>
                    <p class="text-value">{{ $user->username }}</p>
                </div>

                <!--◇bio-->
                <div class="profile-texts">
                    <p class="text-subtitle">bio</p>
                    <p class="text-value">{{ $user->bio }}</p>
                </div>
            </div>

            <!--◇リレーション経由でcontainsを利用することでフォロー中のユーザに$user->idが存在するか否かを調べる/また、自身以外のユーザである必要がある-->
            @if (Auth::user()->isFollowing($user) && Auth::id() !== $user->id)
                <form class="follows-form profile-follows" action="{{ route('auth.follow.cancel', ['user' => $user->id]) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn custom-red-button account-follows-btn">フォロー解除</button>
                </form>

            <!--◇自身以外のユーザの際-->
            @elseif (Auth::id() !== $user->id)
                <form class="follows-form profile-follows" action="{{ route('auth.follow.store', ['user' => $user->id]) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn custom-lblue-button account-follows-btn">フォローする</button>
                </form>
            @endif

        </section>

        <!--────────────────────────────────────-->
        <!--◆投稿表示エリア                     -->
        <!--────────────────────────────────────-->
        <section class="post-list">

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

            </div>
            @endforeach

        </section>
    </main>

</x-login-layout>
