


@extends('layouts.app')


@section('content')


    <h1 style="text-align: center; margin-bottom: 50px;">Новости</h1>

    @if (auth()->check() && auth()->user()->role == 'admin')
        <a href="/create" class="btn btn-secondary"> Написать новость </a>

    @endif


        @foreach($articles as $article)

            <div style="padding-left:20px; border: 10px solid  rgba(244,244,244,.5)">
            <p style=" margin-top:10px; font-size: 10px; color: red; font-weight: bold;">{{ $article->created_at->diffForHumans()  }}</p>
                <div >

        @foreach ($article->images->chunk(1) as $chunk)
            <div>
                @foreach($chunk as $image)
                    <img src="/storage/{{$image->image}}" width="500" height="300">
                @endforeach
            </div>
        @endforeach

            </div>
                @if (auth()->check() && auth()->user()->role == 'admin')
                <div class="update-delete-group">
                    <a href="news/{{ $article->id }}/edit" class="btn btn-light button-control" >Обновить</a>


                    <form method="POST" action="/news/{{ $article->id }}">

                        {{ method_field('DELETE') }}
                        {{ csrf_field() }}

                        <div class="field">
                            <div class="control">
                                <button type="submit" class="pull-right button-control btn btn-dark">Удалить</button>
                            </div>

                        </div>

                    </form>


                </div>
                @endif

    <a href="/news/{{ $article->id }}">
        <h3 class="news-title">
            {{ $article->title }}

        </h3></a>
    <p style="font-size: 14px">{{ $article->description }}</p>
    </div>
@endforeach

@endsection
