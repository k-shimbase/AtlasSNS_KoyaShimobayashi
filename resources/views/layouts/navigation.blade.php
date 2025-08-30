        <div id="head" class="header-flex">

            <!--◆ ヘッダー左側-->
            <h1>
                <a href="{{ url('/top') }}"><img src="images/atlas.png"></a>
            </h1>

            <!--◆ヘッダー右側-->
            <div class="accordion-wrapper">

                <!--◇アコーディオンメニューのトリガー-->
                <div class="accordion-trigger">
                    <p class="trigger-item"><strong>admin</strong>　さん</p>
                    <p class="trigger-item">V</p>

                    <!--◇アイコン-->
                    <div class=trigger-item><img src="{{ asset('images/icon1.png') }}" class="rounded-circle" alt="ICON"></img></div>
                </div>

                <!--◇アコーディオンメニュー-->
                <ul class="accordion-content">
                    <li><a href="{{ route('auth.home') }}">HOME</a></li>
                    <li><a href="{{ route('auth.profile') }}">プロフィール編集</a></li>
                    <li>
                        <form method="POST" name="logout_form" action="{{ route('logout') }}">
                        @csrf
                            <a href="#" onclick="document.logout_form.submit();">ログアウト</a>
                        </form>
                    </li>
                </ul>

            </div>
        </div>
