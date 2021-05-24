@extends('layouts.app')

@section('content')
    @if (Auth::check())
        @if (Auth::id() == $place->user_id);
        <div class="create-container">
            <h1>店名: {{ $place->place_name }} の編集ページ</h1>
            <table>
                {!! Form::model($place, ['route' => ['places.update', $place->id], 'method' => 'put' , 'enctype'=>'multipart/form-data']) !!}
            
                <tbody>
                      <tr>
                        <td>{!! Form::label('place_name', '店名') !!}</td>
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
                        <td>{!! Form::label('lat', '緯度') !!}</td>
                        <td>{!! Form::text('lat', null, ['class' => 'input']) !!}</td>
                      </tr>
                      <tr>
                        <td>{!! Form::label('lng', '経度') !!}</td>
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
                        <td>{!! Form::label('profile_photo','プロフィール写真') !!}</td>
                        <td>{!! Form::file('profile_photo', null, ['class' => 'input']) !!}</td>
                      </tr>
                 </tbody>
              </table>
                      <tr>
                    {!! Form::submit('更新', ['class' => '']) !!}
                    {!! Form::close() !!}
                      </tr>
                   
              <div class="return"> 
                <a href="{{ route('welcome') }}">戻る</a>
              </div>  
                        
                       
             
        </div>
        
        @else
        <div class="create-container">
          <h1>こちらのページは表示できません。</h1>
        </div>
        
        @endif
        
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












  

