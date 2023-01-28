@extends('layouts.admin')

@section('content')
    <hr>
    <h3>Обновить продукт - {{ $product->name }}</h3>
    <hr>
    <form method="post" enctype="multipart/form-data">
        <div class="form-group">
            <input type="text" class="form-control" name="id" value="{{ $product->id }}" hidden>
        </div>
        <div class="form-group">
            <label>Наименование продукта</label>
            <input type="text" class="form-control" name="name" value="{{ $product->name }}">
        </div>
        <div class="form-group">
            <label for="exampleFormControlSelect1">Категория</label>
            <select class="form-control" id="exampleFormControlSelect1" name="category_id">
                @foreach($categories as $category)
                    @if($category->id == $product->category_id)
                        <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                    @else
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endif
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label>Изображение</label>
            <input type="file" class="form-control" name="image" value="{{ $product->image }}">
        </div>

        <div class="form-group">
            <label>Объем</label>
            <input type="text" class="form-control" name="size" value="{{ $product->size }}">
        </div>

        <div class="form-group">
            <label>Цена</label>
            <input type="text" class="form-control" name="price" value="{{ $product->price }}">
        </div>

        <div class="form-group">
            <label>Цена опт</label>
            <input type="text" class="form-control" name="price_opt" value="{{ $product->price_opt }}">
        </div>

        <div class="form-group">
            <label>Описание</label>
            <textarea class="form-control" rows="3" name="description" >{{ $product->description }}</textarea>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-success">Обновить продукт</button>
        </div>
    </form>
@endsection
