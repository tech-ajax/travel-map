@extends('layouts.app')

@section('content')
    
        <div class="show-container">
            <h1>{{ $place->place_name }} の詳細ページ</h1>
            
            <div class="profile-photo">
                <img src="/uploads/{{ $place->profile_photo }}" width="500px" height="auto">
            </div>
            
            <table>
                <tbody>
                      <!--<tr>-->
                      <!--  <td>ID</td>-->
                      <!--  <td>{{ $place->id }}</td>-->
                      <!--</tr>-->
                      
                      <tr>
                        <td>店名</td>
                        <td>{{ $place->place_name }}</td>
                      </tr>
                      <tr>
                        <td>国・地域</td>
                        <td>{{ $place->country }}</td>
                      </tr>
                      <tr>
                        <td>住所</td>
                        <td>{{ $place->address }}</td>
                      </tr>
                      <tr>
                        <td>電話番号</td>
                        <td>{{ $place->phone }}</td>
                      </tr>
                      <tr>
                        <td>リンク</td>
                        <td>{{ $place->link }}</td>
                      </tr>
                      <tr>
                        <td>コメント</td>
                        <td><p>{{ $place->comment }}</p></td>
                      </tr>
                     
                      <tr>
                        <td>ハッシュタグ
                        </td>
                        <td>
                            <ul>
                                @if(count($place->hashTags) > 0)
                                <li>
                                         @foreach($place->hashTags as $hash_tag)
                                                <a href="{{ route('hash_tags.places', ['id' => $hash_tag->id]) }}">
                                                    <span class="">
                                                        <span class="" aria-hidden="true"></span> #{{ $hash_tag->name }}
                                                    </span>
                                                </a>
                                        @endforeach
                                </li>
                                @endif
                            </ul>
                        </td>
                    </tr>
                    
                    
                 </tbody>
            </table>
            
            <div>
                <iframe src='https://www.google.com/maps/embed/v1/place?key=AIzaSyA2NV_HRhtfKhiuJ1xqPpOZuSC1bpBQRr8&q={{ $place->address }}'
                width='600px'
                height='450px'
                frameborder='0'>
                </iframe>
            </div>
            
            <div class="show-bottom">
                @if (Auth::id() == $place->user_id)
                <div class="show-edit">
                {{-- 店の編集ページへのリンク --}}
                {!! link_to_route('places.edit', 'この店を編集', ['place' => $place->id], ['class' => '']) !!}
                </div>
                <div class="show-delete">
                {{-- 店の削除フォーム --}}
                {!! Form::model($place, ['route' => ['places.destroy', $place->id], 'method' => 'delete']) !!}
                {!! Form::submit('削除', ['class' => '']) !!}
                {!! Form::close() !!}
                </div>
                @endif
                <div> 
                    <a href="{{ route('welcome') }}">戻る</a>
                </div>  
            </div>
    
            <div>
        
   
@endsection

 
 
 
 
