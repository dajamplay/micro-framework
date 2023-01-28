@extends('layouts.admin')

@section('content')
    <hr>
    <h3>Страница категории</h3>
    <hr>
    <table class="table table-bordered">
        <thead class="thead-light">
        <tr>
            <th>ID</th>
            <th>Название</th>
            <th>Описание</th>
            <th>Родительская категория</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>{{ $category->id }}</td>
            <td>{{ $category->name }}</td>
            <td>{!! htmlspecialchars_decode($category->description) !!}</td>
            <td>{{ $category->parent->name ?? 'Главная категория'}}</td>
        </tr>
        </tbody>
    </table>
    <a href="/admin/category/update/{{ $category->id }}" class="btn btn-primary">Редактировать</a>
@endsection
