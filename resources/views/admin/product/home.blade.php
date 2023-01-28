@extends('layouts.admin')

@section('content')
    <hr>
    <h3>Список продукции</h3>
    <hr>
    <h4>Фильтр</h4>
    <form method="get">
        <div class="form-group">
            <button type="submit" class="btn btn-success">Очистить фильтр</button>
        </div>
    </form>
    <form method="get">
        <div class="form-group">
            <label for="exampleFormControlSelect1">Категория</label>
            <select class="form-control" id="category_id" name="category_id">
                <option value="">Все</option>
                @foreach($categories as $category)
                    @if($category->parent)
                        @if($category->id == $_GET['category_id'])
                            <option value="{{ $category->id }}" selected>{{ $category->parent->name }} | {{ $category->name }}</option>
                        @else
                            <option value="{{ $category->id }}">{{ $category->parent->name }} | {{ $category->name }}</option>
                        @endif
                    @endif
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-success">Применить фильтр</button>
        </div>
    </form>
    <table class="table table-bordered">
        <thead class="thead-light">
        <tr>
            <th>ID</th>
            <th>Наименование</th>
            <th>Категория</th>
            <th>Объем</th>
            <th>Цена</th>
            <th>Цена опт</th>
            <th>Описание</th>
            <th>Действия</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->category->parent->name }} | {{ $product->category->name }}</td>
                <td>{{ $product->size }}</td>
                <td>{{ $product->price }}</td>
                <td>{{ $product->price_opt }}</td>
                <td>{!! htmlspecialchars_decode($product->description) !!}</td>
                <td>
                    <a href="/admin/product/show/{{ $product->id }}">Подробнее</a>
                    <a href="/admin/product/update/{{ $product->id }}">Редактировать</a>
                    <a href="/admin/product/delete/{{ $product->id }}" onClick="return window.confirm('Удалить продукт - {{ $product->name }}?');">Удалить</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
