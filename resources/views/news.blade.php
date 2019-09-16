


@extends('layouts.app')


@section('content')

    <h1>Новости</h1>

    <ul>
        @forelse($articles as $article)
            <li>
                <a href="{{ $article->path() }}">{{ $article->title }}</a>
            </li>
        @empty
            <li>No news yet.</li>
        @endforelse
    </ul>

@endsection
