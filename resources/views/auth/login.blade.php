@extends('layouts.app')

@section('content')
    
    <div class="login-container">
    
        <div>
            <h1>ログインページ</h1>
        </div>
    
       
        {!! Form::open(['route' => 'login.post']) !!}
            <div class="login-form">
                {!! Form::label('email', 'メールアドレス') !!}
                {!! Form::email('email', old('email'), ['class' => 'login-email']) !!}
            </div>

            <div class="login-form">
                {!! Form::label('password', 'パスワード') !!}
                {!! Form::password('password', ['class' => 'login-password']) !!}
            </div>
            <div class="login-form">
                {!! Form::submit('ログイン', ['class' => 'login-button']) !!}
                {!! Form::close() !!}
            </div>
            <div class="login-form">
                {{-- ユーザ登録ページへのリンク --}}
                <p>{!! link_to_route('signup.get', '新規会員登録はこちら') !!}</p>
            </div>
        
    </div>
@endsection