@extends ('layouts.app')

@section('content')

    <div class="container" style="border: 10px solid rgba(244, 244, 244, 0.5);">
    <a href="/" class="btn btn-light main-button" style="margin-top: 5px; margin-bottom: 10px">На главную</a>



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


    <p style="display: none" id="newsid">{{ $news->slug }}</p>

    @if (auth()->check() && auth()->user()->role == 'admin')
        <script type="application/javascript">
            var isAdmin = true;
        </script>
    @else
        <script type="application/javascript">
            var isAdmin = false;
        </script>
    @endif
    <yandex-map id="yandexMap" style="height: 400px; margin-top: 10px;"></yandex-map>




    </div>
@endsection
