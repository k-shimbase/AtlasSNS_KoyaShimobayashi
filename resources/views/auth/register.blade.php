<x-logout-layout>

    <main>

        {!! Form::open(['url' => '/register', 'method' => 'post', 'class' => 'form-content']) !!}

        <h2 class="subtitle">新規ユーザー登録</h2>

        {{ Form::label('username', 'user name',['class' => 'label-text']) }}
        {{ Form::text('username',null,['class' => 'input input-box', 'required' => true]) }}

        {{ Form::label('email','mail address',['class' => 'label-text']) }}
        {{ Form::email('email',null,['class' => 'input input-box', 'required' => true]) }}

        {{ Form::label('password','password',['class' => 'label-text']) }}
        {{ Form::password('password',['class' => 'input input-box', 'required' => true]) }}

        {{ Form::label('password_confirmation','password confirm',['class' => 'label-text']) }}
        {{ Form::password('password_confirmation',['class' => 'input input-box', 'required' => true]) }}

        {{ Form::submit('REGISETR',['class' => 'btn submit-button login-register-button']) }}

        <p class="footer-text text-medium"><a href="login">ログイン画面へ戻る</a></p>

        {!! Form::close() !!}

    </main>

</x-logout-layout>
