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