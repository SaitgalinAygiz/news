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
            <a href="/news/{{ $news->id }}/edit" class="btn btn-light button-control">Обновить</a>
            <form method="POST" action="/news/{{ $news->id }}">

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


@endsection
