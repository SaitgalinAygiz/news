@extends ('layouts.app')

@section('content')
    <a href="/" class="btn btn-light main-button">На главную</a>



    <h1>{{ $news->title }}</h1>
    @foreach($images as $image)

        <img src="/storage/{{$image->image}}" width="300" height="200">


    @endforeach
    <div>{{ $news->description }}</div>

    <div class="update-delete-group" >
        @if (auth()->check() && auth()->user()->role == 'admin')
            <a href="/update/{{ $news->id }}" class="btn btn-light button-control">Обновить</a>
            {!! Form::open(array('url' => 'news/delete/' . $news->id, 'class' => 'pull-right button-control')) !!}
            {!! Form::hidden('_method', 'POST') !!}
            {!! Form::submit('Удалить', array('class' => 'btn btn-dark')) !!}
            {!! Form::close() !!}
        @endif
    </div>


@endsection
