@extends ('layouts.app')

@section('content')
    <a href="/" class="btn btn-light main-button">На главную</a>



    <h1>{{ $news->title }}</h1>
    @foreach($images as $image)

        <img src="/storage/{{$image->image}}" width="500" height="300">


    @endforeach
    <div class="article-description"><p>{{ $news->description }}</p></div>

    <div class="update-delete-group" >
        @if (auth()->check() && auth()->user()->role == 'admin')
            <a href="/news/{{ $news->slug }}/edit" class="btn btn-light button-control">Обновить</a>
            <form method="POST" action="/news/{{ $news->slug }}">

                {{ method_field('DELETE') }}
                {{ csrf_field() }}

                <div class="field">
                    <div class="control">
                        <button type="submit" class="pull-right button-control btn btn-dark">Удалить</button>
                    </div>

                </div>

            </form>
        @endif





    </div>


    <div id="map" style="height: 400px; margin-top: 30px;"></div>



@endsection
