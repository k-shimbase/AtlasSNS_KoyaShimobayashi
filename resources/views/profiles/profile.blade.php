<x-login-layout>

    <!--────────────────────────────────────-->
    <!--◆プロフィール編集エリア              -->
    <!--────────────────────────────────────-->
    <div class="profile-edit-content">

        <!--◆アイコン-->
        <img src="{{ asset('images/icon1.png') }}" class="rounded-circle" alt="ICON"></img>

        <!--◆プロフィール詳細項目-->
        <form class="profile-info-content" action="" method="POST">

            <!--◇ユーザー名-->
            <div class="profile-info-item">
                <p>user name</p>
                <textarea class="profile-info-box" name="username"></textarea>
            </div>

            <!--◇メールアドレス-->
            <div class="profile-info-item">
                <p>mail address</p>
                <textarea class="profile-info-box" name="mail_address"></textarea>
            </div>

            <!--◇パスワード-->
            <div class="profile-info-item">
                <p>password</p>
                <textarea class="profile-info-box" name="password"></textarea>
            </div>

            <!--◇パスワード確認-->
            <div class="profile-info-item">
                <p>password confirm</p>
                <textarea class="profile-info-box" name="password_confirm"></textarea>
            </div>

            <!--◇bio-->
            <div class="profile-info-item">
                <p>bio</p>
                <textarea class="profile-info-box" name="bio"></textarea>
            </div>

            <!--◇アイコン画像-->
            <div class="profile-info-item">
                <p>icon image</p>
                <textarea class="profile-info-box icon-image" name="icon image"></textarea>
            </div>

            <!--◇更新ボタン-->
            <button type="submit" class="btn profile-update-btn">更新</button>

        </form>

    </div>

</x-login-layout>
