<x-login-layout>

    <main>
        <!--────────────────────────────────────-->
        <!--◆プロフィール編集エリア              -->
        <!--────────────────────────────────────-->
        <section class="profile_edit_content">

            <!--◆アイコン-->
            <img src="{{ asset('images/'. $user->icon_image) }}" class="rounded-circle" alt="ICON"></img>

            <!--◆プロフィール詳細項目-->
            <form class="profile_info_content" action="{{ route('auth.profileEdit') }}" method="POST" enctype="multipart/form-data" >
            @csrf

                <!--◇ユーザー名-->
                <div class="profile_info_item">
                    <p>user name</p>
                    <textarea class="profile_info_box" name="username" required>{{ $user->username }}</textarea>
                </div>

                <!--◇メールアドレス-->
                <div class="profile_info_item">
                    <p>mail address</p>
                    <textarea class="profile_info_box" name="mail_address" required>{{ $user->email }}</textarea>
                </div>

                <!--◇パスワード-->
                <div class="profile_info_item">
                    <p>password</p>
                    <input type="password" class="profile_info_box" name="password" required>
                </div>

                <!--◇パスワード確認-->
                <div class="profile_info_item">
                    <p>password confirm</p>
                    <input type="password" class="profile_info_box" name="password_confirmation" required>
                </div>

                <!--◇bio-->
                <div class="profile_info_item">
                    <p>bio</p>
                    <textarea class="profile_info_box" name="bio">{{ $user->bio }}</textarea>
                </div>

                <!--◇アイコン画像-->
                <div class="profile_info_item">
                    <p>icon image</p>
                    <input type="file" class="profile_info_box icon_image" name="icon_image" accept=".jpg,.png,.bmp,.gif,.svg">
                </div>

                <!--◇更新ボタン-->
                <button type="submit" class="btn profile_update_btn">更新</button>

            </form>
        </section>
    </main>

</x-login-layout>
