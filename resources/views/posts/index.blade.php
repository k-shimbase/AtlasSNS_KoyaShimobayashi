<x-login-layout>

    <!--────────────────────────────────────-->
    <!--◆モーダル(投稿編集)                  -->
    <!--────────────────────────────────────-->
    <section class="modal" id="postEditModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">



                <div id="modalPostBody">
                    <form id="modalPostForm" action="{{ route('auth.posts.update') }}" method="POST">
                        @csrf

                        <!--◇既存の投稿内容表示エリア-->
                        <textarea name="post_text"></textarea>

                        <!--◇ポストID-->
                        <input id="hiddenPostId" type="hidden" name="post_id" value="0">

                        <!--◇編集完了ボタン-->
                        <button type="submit" class="modal_edit_execution post_edit"></button>
                    </form>
                </div>



            </div>
        </div>
    </section>

    <!--────────────────────────────────────-->
    <!--◆モーダル(削除確認)                  -->
    <!--────────────────────────────────────-->
    <section class="modal" id="postTrashModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">



                <div id="modalTrashBody">
                    <p>この投稿を削除します。よろしいでしょうか？</p>

                    <form id="modalTrashForm" action="{{ route('auth.posts.trash') }}" method="POST">
                        @csrf

                        <!--◇ポストID-->
                        <input id="hiddenTrashId" type="hidden" name="post_id" value="0">

                        <div class="trash_buttons">
                            <!--◇削除了承ボタン-->
                            <button type="submit" class="btn modal_trash_button trash_yes">OK</button>

                            <!--◇キャンセルボタン-->
                            <button type="button" class="btn modal_trash_button trash_cancel" data-bs-dismiss="modal">キャンセル</button>
                        </div>

                    </form>
                </div>



            </div>
        </div>
    </section>

    <main>

        <!--────────────────────────────────────-->
        <!--◆投稿記入エリア                     -->
        <!--────────────────────────────────────-->
        <section>
            <form class="main_area post_main" action="{{ route('auth.posts') }}" method="POST">
                @csrf

                <!--◆アイコン-->
                <img src="{{ asset('images/'. Auth::user()->icon_image) }}" class="post_main_content rounded-circle" alt="ICON"></img>

                <!--◆投稿内容入力エリア-->
                <textarea class="post_main_content" name="post_text" placeholder="投稿内容を入力してください。"></textarea>

                <!--◆投稿ボタン-->
                <button type="submit" class="btn custom_blue_button post_main_content"><i class="bi bi-send"></i></button>
            </form>
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
