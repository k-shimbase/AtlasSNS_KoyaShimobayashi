        <div id="head" class="header_flex">

            <!--◆ ヘッダー左側-->
            <h1>
                <a href="{{ url('/top') }}"><img src="{{ asset('images/atlas.png') }}" alt="Logo"></a>
            </h1>

            <!--◆ヘッダー右側-->
            <div class="accordion_wrapper">

                <!--◇アコーディオンメニューのトリガー-->
                <div class="accordion_trigger">
                    <p class="trigger_item trigger_username"><strong>{{ Auth::user()->username }}</strong>　さん</p>
                    <ul class="trigger_item">
                        <li class="trigger_left trigger_line"></li>
                        <li class="trigger_right trigger_line"></li>
                    </ul>

                    <!--◇アイコン-->
                    <div class=trigger_item><img src="{{ asset('images/'. Auth::user()->icon_image) }}" class="rounded-circle" alt="ICON"></img></div>
                </div>

                <!--◇アコーディオンメニュー-->
                <nav>
                    <ul class="accordion_content">
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
