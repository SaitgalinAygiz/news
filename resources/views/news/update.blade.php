@extends ('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">

                <form method="POST" action="/news/{{ $news->id }}" enctype="multipart/form-data">

                    {{ method_field('PATCH') }}
                    {{ csrf_field() }}
                    <div class="form-group">

                        <h2>Обновить новость</h2>

                        <div class="form-group">
                            <input type="text" name="title" id="title"  class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}"  placeholder="Title"  value="{{ $news->title }}">
                        </div>

                        <div class="form-group">
                            <textarea type="text" name="description" id="description" class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" rows="5"  placeholder="Description">{{ $news->description }}</textarea>
                        </div>


                        <div class="image-upload">
                            <label for="image">Выберите картинку</label>
                            <input name ="image" id="image" type="file" multiple name="file[]">
                        </div>
                    </div>

                    @if ($errors->any())
                        <div class="alert alert-danger" style="margin-top: 5px">

                            @foreach($errors->all() as $error)

                                <li>{{ $error }}</li>

                            @endforeach

                        </div>

                    @endif

                    <button type="submit" class="btn btn-secondary">Опубликовать</button>

                    <a href="/" class="btn btn-light main-button">На главную</a>
                </form>
            </div>
        </div>

    </div>

@endsection
