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
                    <p class="trigger-item">icon</p>
                </div>

                <!--◇アコーディオンメニュー-->
                <ul class="accordion-content">
                    <li><a href="">HOME</a></li>
                    <li><a href="">プロフィール編集</a></li>
                    <li>
                        <form method="POST" name="logout_form" action="{{ route('logout') }}">
                        @csrf
                            <a href="#" onclick="document.logout_form.submit();">ログアウト</a>
                        </form>
                    </li>
                </ul>

            </div>
        </div>
