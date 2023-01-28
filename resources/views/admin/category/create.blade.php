@extends('layouts.admin')

@section('content')
    <hr>
    <h3>Создать категорию</h3>
    <hr>
    <form method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label>Имя категории</label>
            <input type="text" class="form-control" name="name" required>
        </div>

        <div class="form-group">
            <label for="exampleFormControlSelect1">Родительская категория</label>
            <select class="form-control" id="exampleFormControlSelect1" name="parent_id">
                <option value="0">Главная категория</option>
{{--                @foreach($rootCategories as $cat)--}}
{{--                    @if($cat['id'] == $cat->parent_id)--}}
{{--                        <option value="{{ $cat->id }}" selected>{{ $cat->name }}</option>--}}
{{--                    @else--}}
{{--                        <option value="{{ $cat->id }}">{{ $cat->name }}</option>--}}
{{--                    @endif--}}
{{--                @endforeach--}}
            </select>
        </div>

        <div class="form-group">
            <label>Изображение</label>
            <input type="file" class="form-control" name="image">
        </div>

        <div class="form-group">
            <label>Описание</label>
            <textarea class="form-control" rows="3" name="description"></textarea>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-success">Создать категорию</button>
        </div>
    </form>
@endsection
