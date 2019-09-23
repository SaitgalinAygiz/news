@extends ('layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">

                <form method="POST" action="{{ 'news/store' }}" enctype="multipart/form-data">

                    {{ csrf_field() }}
                    <div class="form-group">

                        <h2>Создать новость</h2>

                        <div class="form-group">
                           <input type="text" name="title" id="title"  class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}"  placeholder="Title"  value="{{ old('title') }}">
                        </div>

                        <div class="form-group">
                        <textarea type="text" name="description" id="description" class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}"  placeholder="Description">{{ old('description') }}</textarea>

                        </div>
                        @if ($errors->any())
                            <div class="alert alert-danger" style="margin-top: 5px">

                                    @foreach($errors->all() as $error)

                                        <li>{{ $error }}</li>

                                    @endforeach

                            </div>

                        @endif

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
