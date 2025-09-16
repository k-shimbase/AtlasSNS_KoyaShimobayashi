<x-logout-layout>

    <main>

        {!! Form::open(['url' => '/login', 'method' => 'post', 'class' => 'form-content']) !!}

            <p class="subtitle">AtlasSNSへようこそ</p>

            {{ Form::label('email','mail address',['class' => 'label-text']) }}
            {{ Form::text('email',null,['class' => 'input input-box', 'required' => true]) }}
            {{ Form::label('password','password',['class' => 'label-text']) }}
            {{ Form::password('password',['class' => 'input input-box', 'required' => true]) }}

            {{ Form::submit('LOGIN',['class' => 'btn submit-button login-register-button']) }}

            <p class="footer-text text-small"><a href="register">新規ユーザーの方はこちら</a></p>

        {!! Form::close() !!}

    </main>

</x-logout-layout>
