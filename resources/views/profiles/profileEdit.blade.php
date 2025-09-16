<x-login-layout>

    <main>
        <!--────────────────────────────────────-->
        <!--◆プロフィール編集エリア              -->
        <!--────────────────────────────────────-->
        <section class="profile-edit-content">

            <!--◆アイコン-->
            <img src="{{ asset('images/'. $user->icon_image) }}" class="rounded-circle" alt="ICON"></img>

            <!--◆プロフィール詳細項目-->
            <form class="profile-info-content" action="{{ route('auth.profileEdit') }}" method="POST" enctype="multipart/form-data" >
            @csrf

                <!--◇ユーザー名-->
                <div class="profile-info-item">
                    <p>user name</p>
                    <textarea class="profile-info-box" name="username" required>{{ $user->username }}</textarea>
                </div>

                <!--◇メールアドレス-->
                <div class="profile-info-item">
                    <p>mail address</p>
                    <textarea class="profile-info-box" name="mail_address" required>{{ $user->email }}</textarea>
                </div>

                <!--◇パスワード-->
                <div class="profile-info-item">
                    <p>password</p>
                    <input type="password" class="profile-info-box" name="password" required>
                </div>

                <!--◇パスワード確認-->
                <div class="profile-info-item">
                    <p>password confirm</p>
                    <input type="password" class="profile-info-box" name="password_confirmation" required>
                </div>

                <!--◇bio-->
                <div class="profile-info-item">
                    <p>bio</p>
                    <textarea class="profile-info-box" name="bio">{{ $user->bio }}</textarea>
                </div>

                <!--◇アイコン画像-->
                <div class="profile-info-item">
                    <p>icon image</p>
                    <input type="file" class="profile-info-box icon-image" name="icon_image" accept=".jpg,.png,.bmp,.gif,.svg">
                </div>

                <!--◇更新ボタン-->
                <button type="submit" class="btn profile-update-btn">更新</button>

            </form>
        </section>
    </main>

</x-login-layout>
