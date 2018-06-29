@if (Auth::user()->is_favoriting($micropost->id))
    {!! Form::open(['route' => ['user.unfavorite', $micropost->id], 'method' => 'delete', 'style' => 'display:inline-block;']) !!}
        {!! Form::submit('unfavorite', ['class' => 'btn btn-warning btn-xs']) !!}
    {!! Form::close() !!}
@else
    {!! Form::open(['route' => ['user.favorite', $micropost->id], 'style' => 'display:inline-block;']) !!}
        {!! Form::submit('favorite', ['class' => 'btn btn-primary btn-xs']) !!}
    {!! Form::close() !!}
@endif
