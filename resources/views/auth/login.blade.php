<x-logout-layout>

    <main>

        {!! Form::open(['url' => '/login', 'method' => 'post', 'class' => 'form_content']) !!}

            <p class="subtitle">AtlasSNSへようこそ</p>

            {{ Form::label('email','mail address',['class' => 'label_text']) }}
            {{ Form::text('email',null,['class' => 'input input_box', 'required' => true]) }}
            {{ Form::label('password','password',['class' => 'label_text']) }}
            {{ Form::password('password',['class' => 'input input_box', 'required' => true]) }}

            {{ Form::submit('LOGIN',['class' => 'btn submit_button login_register_button']) }}

            <p class="footer_text text_small"><a href="register">新規ユーザーの方はこちら</a></p>

        {!! Form::close() !!}

    </main>

</x-logout-layout>
