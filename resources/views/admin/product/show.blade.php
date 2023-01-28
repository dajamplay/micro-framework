@extends('layouts.admin')

@section('content')
    <hr>
    <h3>{{ $product->name }}</h3>
    <hr>
    <table class="table table-bordered">
        <thead class="thead-light">
        <tr>
            <th>ID</th>
            <th>Название</th>
            <th>Категория</th>
            <th>Объем</th>
            <th>Цена</th>
            <th>Цена опт</th>
            <th>Описание</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>{{ $product->id }}</td>
            <td>{{ $product->name }}</td>
            <td>{{ $product->category->parent->name }} | {{ $product->category->name }}</td>
            <td>{{ $product->size }}</td>
            <td>{{ $product->price }}</td>
            <td>{{ $product->price_opt }}</td>
            <td>{!! htmlspecialchars_decode($product->description) !!}</td>
        </tr>
        </tbody>
    </table>
    <a href="/admin/product/update/{{ $product->id }}" class="btn btn-primary">Редактировать</a>
@endsection
