@extends('layouts.admin')

@section('content')
    <hr>
    <h3>Excel</h3>
    <hr>
    <form method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="exampleFormControlSelect1">Категория для загрузки</label>
            <select class="form-control" id="exampleFormControlSelect1" name="category_id" required>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label>Файл Excel</label>
            <input type="file" class="form-control" name="excel_file" required>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-success">Загрузить файл</button>
        </div>
    </form>
@endsection
