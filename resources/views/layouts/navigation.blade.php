        <div id="head" class="header-flex">

            <!--◆ ヘッダー左側-->
            <h1>
                <a href="{{ url('/top') }}"><img src="{{ asset('images/atlas.png') }}" alt="Logo"></a>
            </h1>

            <!--◆ヘッダー右側-->
            <div class="accordion-wrapper">

                <!--◇アコーディオンメニューのトリガー-->
                <div class="accordion-trigger">
                    <p class="trigger-item trigger-username"><strong>{{ Auth::user()->username }}</strong>　さん</p>
                    <ul class="trigger-item">
                        <li class="trigger-left trigger-line"></li>
                        <li class="trigger-right trigger-line"></li>
                    </ul>

                    <!--◇アイコン-->
                    <div class=trigger-item><img src="{{ asset('images/'. Auth::user()->icon_image) }}" class="rounded-circle" alt="ICON"></img></div>
                </div>

                <!--◇アコーディオンメニュー-->
                <nav>
                    <ul class="accordion-content">
                        <li><a href="{{ route('auth.home') }}">HOME</a></li>
                        <li><a href="{{ route('auth.showProfileEdit') }}">プロフィール編集</a></li>

                        <li>
                            <!--◇ログアウト(POSTで送信する為フォームを利用している)-->
                            <form method="POST" name="logout_form" action="{{ route('logout') }}">
                            @csrf
                                <button type="submit">ログアウト</button>
                            </form>
                        </li>
                    </ul>
                </nav>

            </div>
        </div>
