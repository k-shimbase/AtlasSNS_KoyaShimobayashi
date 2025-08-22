<x-logout-layout>
    <!-- 適切なURLを入力してください -->
{!! Form::open(['url' => '/register', 'method' => 'post']) !!}

<h2>新規ユーザー登録</h2>

{{ Form::label('ユーザー名') }}
{{ Form::text('username',null,['class' => 'input', 'required' => true]) }}

{{ Form::label('メールアドレス') }}
{{ Form::email('email',null,['class' => 'input', 'required' => true]) }}

{{ Form::label('パスワード') }}
{{ Form::password('password',['class' => 'input', 'required' => true]) }}

{{ Form::label('パスワード確認') }}
{{ Form::password('password_confirmation',['class' => 'input', 'required' => true]) }}

{{ Form::submit('登録') }}

<p><a href="login">ログイン画面へ戻る</a></p>

{!! Form::close() !!}


</x-logout-layout>
