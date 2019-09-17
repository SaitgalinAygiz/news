


@extends('layouts.app')


@section('content')

    <h1>Новости</h1>


        @foreach($articles as $article)
            <p style="margin-top: 70px; font-size: 10px; color: red; font-weight: bold;">{{ $article->created_at  }}</p>
            <p>{{ $article->image }}</p>

            <li>
                {{ $article->title }}

            </li>
            <p>{{ $article->description }}</p>

        @endforeach

@endsection
