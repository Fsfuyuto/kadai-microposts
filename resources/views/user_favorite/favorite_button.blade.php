@if (Auth::user()->is_favorite($micropost->id))
    {{-- お気に入り解除ボタンのフォーム --}}
    {!! Form::open(['route' => ['favorites.unfavorite', $micropost->id], 'method' => 'delete', 'class' => 'd-inline-flex']) !!}
        {!! Form::submit('UnFavorite', ['class' => "btn btn-warning btn-block"]) !!}
    {!! Form::close() !!}
@else　
    {{-- お気に入り登録ボタンのフォーム --}}
    {!! Form::open(['route' => ['favorites.favorite', $micropost->id], 'class' => 'd-inline-flex']) !!}
        {!! Form::submit('favorite', ['class' => "btn btn-success btn-block"]) !!}
    {!! Form::close() !!}
@endif