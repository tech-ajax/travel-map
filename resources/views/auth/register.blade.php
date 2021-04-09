@extends('layouts.app')

@section('content')
    
    <div class="register-container">
        <div>
            <h1>登録ページ</h1>
        </div>
        <div class="register-box">
        
   

            {!! Form::open(['route' => 'signup.post']) !!}
                <div class="register-form">
                    {!! Form::label('name', '名前') !!}
                    {!! Form::text('name', old('name'), ['class' => 'register-name']) !!}
                </div>

                <div class="register-form">
                    {!! Form::label('email', 'メールアドレス') !!}
                    {!! Form::email('email', old('email'), ['class' => 'register-email']) !!}
                </div>
                
                <div class="register-form">
                    {!! Form::label('role', 'ユーザー or オーナー') !!}
                    {!!Form::select('role', ['ユーザー' => 'ユーザー', 'オーナー' => 'オーナー'], 'オーナー', ['class' => 'register-option'])
 !!}
                </div>
                <div class="register-form">
                    <p>（ユーザーはお気に入り登録、オーナーは店舗登録が可能）</p>
                </div>

                <div class="register-form">
                    {!! Form::label('password', 'パスワード') !!}
                    {!! Form::password('password', ['class' => 'register-password']) !!}
                </div>

                <div class="register-form">
                    {!! Form::label('password_confirmation', 'パスワード（確認）') !!}
                    {!! Form::password('password_confirmation', ['class' => 'register-confirmation']) !!}
                </div>

                {!! Form::submit('登録', ['class' => 'register-button']) !!}
            {!! Form::close() !!}
    
        </div>
    </div>
@endsection