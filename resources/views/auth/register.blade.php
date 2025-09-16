<x-logout-layout>

    <main>

        {!! Form::open(['url' => '/register', 'method' => 'post', 'class' => 'form_content']) !!}

        <h2 class="subtitle">新規ユーザー登録</h2>

        {{ Form::label('username', 'user name',['class' => 'label_text']) }}
        {{ Form::text('username',null,['class' => 'input input_box', 'required' => true]) }}

        {{ Form::label('email','mail address',['class' => 'label_text']) }}
        {{ Form::email('email',null,['class' => 'input input_box', 'required' => true]) }}

        {{ Form::label('password','password',['class' => 'label_text']) }}
        {{ Form::password('password',['class' => 'input input_box', 'required' => true]) }}

        {{ Form::label('password_confirmation','password confirm',['class' => 'label_text']) }}
        {{ Form::password('password_confirmation',['class' => 'input input_box', 'required' => true]) }}

        {{ Form::submit('REGISETR',['class' => 'btn submit_button login_register_button']) }}

        <p class="footer_text text_medium"><a href="login">ログイン画面へ戻る</a></p>

        {!! Form::close() !!}

    </main>

</x-logout-layout>
