


@extends('layouts.app')


@section('content')


    <h1 style="text-align: center; margin-bottom: 50px;">Новости</h1>


        @foreach($articles as $article)

            <div style="border: 10px solid  rgba(244,244,244,.5)">
            <p style=" font-size: 10px; color: red; font-weight: bold;">{{ $article->created_at  }}</p>

                @foreach ($article->images->chunk(1) as $chunk)

                    <div>
                        @foreach($chunk as $image)
                            <img src="{{$image->image}}" width="300" height="200">
                        @endforeach

                    </div>


                @endforeach


            <a href="/article/{{ $article->id }}"><h3 style="margin-top: 50px;">
                {{ $article->title }}

            </h3></a>
            <p style="font-size: 14px">{{ $article->description }}</p>
            </div>
        @endforeach

@endsection
