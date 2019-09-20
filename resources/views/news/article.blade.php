@extends ('layouts.app')

@section('content')
    <a href="/" class="btn btn-light">На главную</a>



    <h1>{{ $news->title }}</h1>
    @foreach($images as $image)

        <img src="/storage/{{$image->image}}" width="300" height="200">


    @endforeach
    <div>{{ $news->description }}</div>



    @if (auth()->check() && auth()->user()->role == 'admin')
        <a href="/update/{{ $news->id }}" class="btn btn-light">Обновить</a>
        {!! Form::open(array('url' => 'news/delete/' . $news->id, 'class' => 'pull-right')) !!}
        {!! Form::hidden('_method', 'POST') !!}
        {!! Form::submit('Удалить', array('class' => 'btn btn-dark')) !!}
        {!! Form::close() !!}
    @endif


@endsection
