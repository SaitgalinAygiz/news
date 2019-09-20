


@extends('layouts.app')


@section('content')


    <h1 style="text-align: center; margin-bottom: 50px;">Новости</h1>

    @if (auth()->check() && auth()->user()->role == 'admin')
        <a href="/create" class="btn btn-secondary"> Написать новость </a>

    @endif

        @foreach($articles as $article)

            <div style="padding-left:20px; border: 10px solid  rgba(244,244,244,.5)">
            <p style=" margin-top:10px; font-size: 10px; color: red; font-weight: bold;">{{ $article->created_at->diffForHumans()  }}</p>


        @foreach ($article->images->chunk(1) as $chunk)

            <div>
                @foreach($chunk as $image)
                    <img src="/storage/{{$image->image}}" width="500" height="300">


                @endforeach


            </div>




        @endforeach
                <div class="update-delete-group">@if (auth()->check() && auth()->user()->role == 'admin')
                    <a href="update/{{ $article->id }}" class="btn btn-light button-control" >Обновить</a>

                    {!! Form::open(array('url' => 'news/delete/' . $article->id, 'class' => 'pull-right button-control')) !!}
                    {!! Form::hidden('_method', 'POST') !!}
                    {!! Form::submit('Удалить', array('class' => 'btn btn-dark')) !!}
                    {!! Form::close() !!}

                @endif</div>

    <a href="/news/{{ $article->id }}">
        <h3 class="news-title">
            {{ $article->title }}

        </h3></a>
    <p style="font-size: 14px">{{ $article->description }}</p>
    </div>
@endforeach

@endsection
