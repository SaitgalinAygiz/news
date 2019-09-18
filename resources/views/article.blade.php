@extends ('layouts.app')

@section('content')
    <a href="/">На главную</a>



    <h1>{{ $news->title }}</h1>
    @foreach($images as $image)

        <img src="/{{$image->image}}" width="300" height="200">


    @endforeach
    <div>{{ $news->description }}</div>


@endsection
