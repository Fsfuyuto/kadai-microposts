@if (count($users) > 0)
    <ul class="list-unstyled">
        @foreach ($users as $user)
            <li class="media">
                {{-- ユーザのメールアドレスをもとにGravatarを取得して表示 --}}
                <img class="mr-2 rounded" src="{{ Gravatar::get($user->email, ['size' => 50]) }}" alt="">
                <div class="media-body">
                    <div>
                        {{ $user->name }}
                    </div>
                    <div>
                        {{-- ユーザ詳細ページへのリンク --}}
                        <p>{!! link_to_route('users.show', 'View profile', ['user' => $user->id]) !!}</p>
                    </div>
                    <div class="row">
                        <div class="col-3 mb-2" >
                        @if (Auth::id() != $user->id)
                            @if (Auth::user()->is_favorite($user->id))
                                {{-- アンフォローボタンのフォーム --}}
                                {!! Form::open(['route' => ['favorites.unfavorite', $user->id], 'method' => 'delete']) !!}
                                    {!! Form::submit('Unfavorite', ['class' => "btn btn-success btn-block"]) !!}
                                {!! Form::close() !!}
                            @else
                                {{-- フォローボタンのフォーム --}}
                                {!! Form::open(['route' => ['favorites.favorite', $user->id]]) !!}
                                    {!! Form::submit('Favorite', ['class' => "btn btn-light btn-block"]) !!}
                                {!! Form::close() !!}
                            @endif
                        @endif
                        </div>
                    </div>
                </div>
            </li>
        @endforeach
    </ul>
     {{-- ページネーションのリンク --}}
    {{ $users->links() }}
@endif