@extends('layouts.app')

@section('content')
    @if (Auth::check())
        <div class="create-container">
        
            <h1>{{ Auth::user()->name }}の店舗登録ページ</h1>
            <p>※任意以外の項目は入力必須でございます。</p>
            
            
                      
            <table>
                {!! Form::model($place, ['route' => 'places.store','enctype'=>'multipart/form-data']) !!}
                <tbody>
                      <tr>
                        <td>{!! Form::label('place_name', '名前') !!}</td>
                        <td>{!! Form::text('place_name', null, ['class' => 'input']) !!}</td>
                      </tr>
                      <tr>
                        <td>{!! Form::label('country', 'ジャンル') !!}</td>
                        <td>{!! Form::text('country', null, ['class' => 'input']) !!}</td>
                      </tr>
                      <tr>
                        <td>{!! Form::label('address', '住所') !!}</td>
                        <td>{!! Form::text('address', null, ['class' => 'input']) !!}</td>
                      </tr>
                      <tr>
                        <td>{!! Form::label('lat', '緯度(任意)') !!}</td>
                        <td>{!! Form::text('lat', null, ['class' => 'input']) !!}</td>
                      </tr>
                      <tr>
                        <td>{!! Form::label('lng', '経度（任意）') !!}</td>
                        <td>{!! Form::text('lng', null, ['class' => 'input']) !!}</td>
                      </tr>

                      <tr>
                        <td>{!! Form::label('phone', '電話番号') !!}</td>
                        <td>{!! Form::text('phone', null, ['class' => 'input']) !!}</td>
                      </tr>
                      <tr>
                        <td>{!! Form::label('link', 'Link') !!}</td>
                        <td>{!! Form::text('link', null, ['class' => 'input']) !!}</td>
                      </tr>
                      <tr>
                        <td>{!! Form::label('comment', 'コメント') !!}</td>
                        <td>{!! Form::text('comment', null, ['class' => 'input']) !!}</td>
                      </tr>
                      
                      <tr>
                        <td>{!! Form::label('profile_photo','プロフィール写真（任意）') !!}</td>
                        <td>{!! Form::file('profile_photo') !!}</td>
                      </tr>
                     <tr>
                        <td>{!! Form::label('hash_tags', 'ハッシュタグ（例：フレンチ、最寄り駅など）') !!}</td>
                        <td>{!! Form::text('hash_tags', old('hash_tags'), ['class' => 'input', 'placeholder'=>'ハッシュタグを入力してください。']) !!}</td>
                      </tr>
                </tbody>
              </table>
                               
                            
                    
                        <p>複数のハッシュタグをつける場合は、半角スペースで区切ってください。</p>
                      </tr>
                      <tr>
                    {!! Form::submit('登録', ['class' => '']) !!}
                    {!! Form::close() !!}
                      </tr>

                       
                        
                       
                </div>
            </div>    
        </div>
        
    @else
        <div>
            <div>
               
                <p>Tokyoで世界のごはんを食べよう。</p>
                {{-- ユーザ登録ページへのリンク --}}
                {!! link_to_route('signup.get', 'Sign up now!', [], ['class' => 'btn btn-lg btn-primary']) !!}
            </div>
        </div>
    @endif
@endsection


