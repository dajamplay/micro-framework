@extends('layouts.admin')

@section('content')
    <hr>
    <h3>Обновить категорию - {{ $category->name }}</h3>
    <hr>
    <form method="post" enctype="multipart/form-data">
        <div class="form-group">
            <input type="text" class="form-control" name="id" value="{{ $category->id }}" hidden>
        </div>
        <div class="form-group">
            <label>Имя категории</label>
            <input type="text" class="form-control" name="name" value="{{ $category->name }}" required>
        </div>
        <div class="form-group">
            <label for="exampleFormControlSelect1">Родительская категория</label>
            <select class="form-control" id="exampleFormControlSelect1" name="parent_id">
                <option value="0">Главная категория</option>
            </select>
        </div>
        <div class="form-group">
            <label>Иыбрать новое изображение</label>
            <input type="file" class="form-control" name="image">
            <p><img height="100px" src="/uploads/{{ $category->image }}"></p>
        </div>
        <div class="form-group">
            <label>Описание</label>
            <textarea class="form-control" rows="3" id="d1" name="description">{{ $category->description }}</textarea>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-success">Обновить категорию</button>
        </div>
    </form>
@endsection
