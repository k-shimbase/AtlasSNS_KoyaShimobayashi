//━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
// ◆デバッグ
//━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
window.f = function (id) {
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: '/follow/' + id,
        type: 'POST',
        success: function () {
            window.location.href = '/top';
        }
    });
};

window.uf = function (id) {
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: '/unfollow/' + id,
        type: 'POST',
        success: function () {
            window.location.href = '/top';
        }
    });
};

//━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
// ◆アコーディオンメニューの動作
//━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
$(document).ready(function () {
    $(".accordion-trigger").on("click", function () {
        $(".accordion-content").slideToggle();
        $(".trigger-line").toggleClass("active");
    });
});

//━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
// ◆投稿編集画面のモーダル(非同期処理)
//━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
$(document).ready(function () {
    $(".post-myself-item.post-edit").on("click", function () {

        const post_id = $(this).data("post-id");

        //非同期処理で編集画面のモーダルへと既存ポストのデータを出力する
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: '/posts/modal-text',
            type: 'POST',
            dataType: 'json',
            data: {
                post_id: post_id
            },

            success: function (data) {

                //テキスト内容の反映
                $('.modal-post-body textarea').val(data.post);

                //modalPostForm内に存在するhidden_post_idの値変更
                $('#hidden_post_id').attr('value', post_id);

                //モーダルを表示する
                $('#post-edit-modal').modal('show');
            },

            error: function () {
                alert('投稿内容を取得できませんでした');
            }
        });
    });
});

//━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
// ◆投稿削除ボタンのクリック処理(一覧から)
//━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
$(document).ready(function () {
    $(".post-myself-item.post-trash").on("click", function () {

        const post_id = $(this).data("post-id");

        //hidden input の値を更新
        $('#hidden_trash_id').attr('value', post_id);

        //モーダルを表示
        $('#post-trash-modal').modal('show');

    });
});
