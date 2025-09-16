//━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
// ◆アコーディオンメニューの動作
//━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
$(document).ready(function () {
    $(".accordion_trigger").on("click", function () {
        $(".accordion_content").slideToggle();
        $(".trigger_line").toggleClass("active");
    });
});

//━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
// ◆投稿編集画面のモーダル(非同期処理)
//━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
$(document).ready(function () {
    $(".post_myself_item.post_edit").on("click", function () {

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
                $('#modalPostBody textarea').val(data.post);

                //modalPostForm内に存在するhidden_post_idの値変更
                $('#hiddenPostId').attr('value', post_id);

                //モーダルを表示する
                $('#postEditModal').modal('show');
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
    $(".post_myself_item.post_trash").on("click", function () {

        const post_id = $(this).data("post-id");

        //hidden input の値を更新
        $('#hiddenTrashId').attr('value', post_id);

        //モーダルを表示
        $('#postTrashModal').modal('show');

    });
});

//━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
// ◆サイドバー調整処理(子要素が親要素を突き抜けて伸びている為jsでサイドバーを調整する必要がある)
//━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
$(document).ready(function () {

    //サイドバーを画面下部まで調整する
    $('#sidebar').height($(document).height());

});
