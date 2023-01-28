@extends('layouts.admin')

@section('content')
    <hr>
    <h3>Загрузить изображение</h3>
    <form method="post" enctype="multipart/form-data">

        <div class="form-group">
            <input type="file" class="form-control" name="image">
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-success">Загрузить изображение</button>
        </div>
    </form>
    <hr>
    <h3>Галерея</h3>
    <div class="row">
        @foreach ($images as $image)
            <div class="col-3 pb-3 d-flex align-items-stretch">
                <div class="card">
                    <img class="card-img-top" src="{{$url . $image->name}}" alt="{{$image->name}}">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{{$image->name}}</h5>
                        <p class="card-text small">{{$url . $image->name}}</p>
                        <a class="btn btn-outline-success btn-block mt-auto btn-copy" data-copy="{{$url . $image->name}}">Скопировать ссылку</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>


@endsection
