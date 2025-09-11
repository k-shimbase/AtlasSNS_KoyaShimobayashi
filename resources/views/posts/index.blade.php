<x-login-layout>

    <!--────────────────────────────────────-->
    <!--◆メインエリア(投稿記入エリア)        -->
    <!--────────────────────────────────────-->
    <form class="main-area post-main" action="{{ route('auth.posts') }}" method="POST">
        @csrf

        <!--◆アイコン-->
        <img src="{{ asset('images/'. Auth::user()->icon_image) }}" class="post-main-content rounded-circle" alt="ICON"></img>

        <!--◆投稿内容入力エリア-->
        <textarea class="post-main-content" name="post_text" placeholder="投稿内容を入力してください。"></textarea>

        <!--◆投稿ボタン-->
        <button type="submit" class="btn custom-blue-button post-main-content"><i class="bi bi-send"></i></button>
    </form>

    <!--────────────────────────────────────-->
    <!--◆モーダル(投稿編集)                  -->
    <!--────────────────────────────────────-->
    <div class="modal" id="post-edit-modal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">



                <div class="modal-post-body">
                    <form id="modal-post-form" action="{{ route('auth.posts.update') }}" method="POST">
                        @csrf

                        <!--◇既存の投稿内容表示エリア-->
                        <textarea name="post_text"></textarea>

                        <!--◇ポストID-->
                        <input id="hidden_post_id" type="hidden" name="post_id" value="0">

                        <!--◇編集完了ボタン-->
                        <button type="submit" class="modal-edit-execution post-edit"></button>
                    </form>
                </div>



            </div>
        </div>
    </div>

    <!--────────────────────────────────────-->
    <!--◆モーダル(削除確認)                  -->
    <!--────────────────────────────────────-->
    <div class="modal" id="post-trash-modal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">



                <div id="modal-trash-body">
                    <p>この投稿を削除します。よろしいでしょうか？</p>

                    <form id="modal-trash-form" action="{{ route('auth.posts.trash') }}" method="POST">
                        @csrf

                        <!--◇ポストID-->
                        <input id="hidden_trash_id" type="hidden" name="post_id" value="0">

                        <div class="trash-buttons">
                            <!--◇削除了承ボタン-->
                            <button type="submit" class="btn modal-trash-button trash-yes">OK</button>

                            <!--◇キャンセルボタン-->
                            <button type="button" class="btn modal-trash-button trash-cancel" data-bs-dismiss="modal">キャンセル</button>
                        </div>

                    </form>
                </div>



            </div>
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
