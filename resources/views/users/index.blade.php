@extends('layouts.app')
ユーザーのページだよー
@section('content')
    @if (Auth::check())
        <div class="index-container">
            {{-- オーナー登録ページへのリンク --}}
                {!! link_to_route('places.create', '登録はこちらから', [], ['class' => '']) !!}
        <h1>{{ Auth::user()->name }}さんのページです。</h1>
       
        <div class="index-grid">
            @if (count($places) > 0)
          
                
                @foreach ($places as $place)
                @if(Auth::id() == $place->user_id)
                
                <div class="index-wrapper">
                    <div class="index-box">
                        <img src="/uploads/{{ $place->profile_photo }}" width="500px" height="auto">
                        <table class="index-table">
                        
                        <tr>
                        <td>ID</td>
                        <td>{{ $place->id }}</td>
                        </tr>
                        
                        <tr>
                        <td>UserID</td>
                        <td>{{ $place->user_id }}</td>
                        </tr> 

                        <tr>
                        <td>名前</td>
                        <td>{{ $place->place_name }}</td>
                        </tr>
                        <tr>
                        <td>ジャンル</td>
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
                        <td>{{ $place->comment }}</td>
                        </tr> 
                        
                        <tr>
                        <td>タグ</td>
                        <td>@if(count($place->hashTags) > 0)
                            @foreach($place->hashTags as $hash_tag)
                                        <a href="{{ route('hash_tags.places', ['id' => $hash_tag->id]) }}">
                                            <span>{{ $hash_tag->name }}</span>
                                        </a>
                            @endforeach
                        @endif
                        </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                
                            </td>
                        </tr>
                        </table>
                        <div class="edit-link">
                            <a href="{{ route('places.edit', ['place' => $place->id]) }}">
                            編集はこちらです。
                            </a>
                        </div>
                        <div class="show-link">
                            <a href="{{ route('places.show', ['place' => $place->id]) }}">
                            For More
                            </a>
                        </div>
                        
                    </div>
                </div>
                @endif
                @endforeach
            @endif
        </div>
        
    </div>    
        
        
        
    @else
        <div class="index-container">
            {{-- オーナー登録ページへのリンク --}}
                {!! link_to_route('signup.get', '登録はこちらから', [], ['class' => '']) !!}
        <h1>リスト</h1>
       
        <div class="index-grid">
            @if (count($places) > 0)
          
                
                @foreach ($places as $place)
                <div class="index-wrapper">
                    <div class="index-box">
                        <img src="/uploads/{{ $place->profile_photo }}" width="500px" height="auto">
                        <table class="index-table">
                        
                        <!--<tr>-->
                        <!--<td>ID</td>-->
                        <!--<td>{{ $place->id }}</td>-->
                        <!--</tr>-->
                        
                        <!--<tr>-->
                        <!--<td>UserID</td>-->
                        <!--<td>{{ $place->user_id }}</td>-->
                        <!--</tr> -->

                        <tr>
                        <td>名前</td>
                        <td>{{ $place->place_name }}</td>
                        </tr>
                        <tr>
                        <td>ジャンル</td>
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
                        <td>{{ $place->comment }}</td>
                        </tr> 
                        
                        <tr>
                        <td>タグ</td>
                        <td>@if(count($place->hashTags) > 0)
                            @foreach($place->hashTags as $hash_tag)
                                        <a href="{{ route('hash_tags.places', ['id' => $hash_tag->id]) }}">
                                            <span>#{{ $hash_tag->name }}</span>
                                        </a>
                            @endforeach
                        @endif
                        </td>
                        </tr> 
                        </table>
                    </div>
                    <div class="show-link">
                            <a href="{{ route('places.show', ['place' => $place->id]) }}">
                            For More
                            </a>
                    </div>
                </div>
                @endforeach
            @endif
        </div>
        
    </div>    
            
            
            </div>
        </div>
    @endif
@endsection