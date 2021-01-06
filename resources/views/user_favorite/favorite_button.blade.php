@if (Auth::id() != $user->id)
    @if (Auth::user()->is_favorite($user->id))
        {{-- アンフォローボタンのフォーム --}}
        {!! Form::open(['route' => ['favorites.unfavorite', $user->id], 'method' => 'delete']) !!}
            {!! Form::submit('Unfavorite', ['class' => "btn btn-light btn-block"]) !!}
        {!! Form::close() !!}
    @else
        {{-- フォローボタンのフォーム --}}
        {!! Form::open(['route' => ['favorites.favorite', $user->id]]) !!}
            {!! Form::submit('Favorite', ['class' => "btn btn-success btn-block"]) !!}
        {!! Form::close() !!}
    @endif
@endif