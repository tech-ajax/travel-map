
@if(Auth::id() == $user->id)

@extends('layouts.app')

@section('content')
    @if(Auth::check() && Auth::user()->role == 'ユーザー')
        <div class="index-container">
                <h1>ユーザー：{{ Auth::user()->name }}さんのページです。</h1>
                <a href="{{ route('users.favorites',['id' => Auth::user()->id]) }}">お気に入りページはこちら</a>
                
                <h2>リスト</h2>               
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
                                <tr>
                                    <td></td>
                                    <td>
                                        
                                    </td>
                                </tr>
                                </table>
                                
                                <div class="show-link">
                                    <a href="{{ route('places.show', ['place' => $place->id]) }}">
                                    For More
                                    </a>
                                </div>
                                <div>
                                    @if (Auth::user()->is_favorite($place->id))
                                        {{-- アンフォローボタンのフォーム --}}
                                        {!! Form::open(['route' => ['favorites.unfavorite', $place->id], 'method' => 'delete']) !!}
                                        {!! Form::submit('Unfavorite', ['class' => ""]) !!}
                                        {!! Form::close() !!}
                                    @else
                                        {{-- フォローボタンのフォーム --}}
                                        {!! Form::open(['route' => ['favorites.favorite', $place->id]]) !!}
                                        {!! Form::submit('Favorite', ['class' => "" ]) !!}
                                        {!! Form::close() !!}
                                    @endif
                                </div>
                            </div>
                        </div>
                        
                        @endforeach
                    @endif
                </div>
                
            </div>    
    
    @else
    
    
    @endif


@else
users.showのページだよー



@endif