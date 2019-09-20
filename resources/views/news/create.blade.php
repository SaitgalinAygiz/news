@extends ('layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">

                <form method="POST" action="{{ 'news/store' }}" enctype="multipart/form-data">

                    {{ csrf_field() }}
                    <div class="form-group">

                        <label for="body">Создать новость</label>

                        <textarea name="title" id="title"  class="form-control @error('title') is-invalid @enderror"  placeholder="Title" rows="1"></textarea>
                        @error('title')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                        <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror "  placeholder="Description" rows="5"></textarea>

                        @error('description')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror

                        <div class="image-upload">
                              <label for="image">Выберите картинку</label>
                              <input name ="image" id="image" type="file" multiple name="file[]">
                        </div>
                    </div>

                    <button type="submit" class="btn btn-secondary">Опубликовать</button>

                    <a href="/" class="btn btn-light main-button">На главную</a>
                </form>
            </div>
        </div>

    </div>

@endsection
