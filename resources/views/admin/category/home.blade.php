@extends('layouts.admin')

@section('content')
    <hr>
    <h3>Список категорий</h3>
    <hr>
    <table class="table table-bordered">
        <thead class="thead-light">
        <tr><th>ID</th><th>Наименование</th><th>Родительская категория</th><th>Описание</th><th>Действия</th></tr>
        </thead>
        <tbody>
        @foreach ($categories as $category)
            <tr>
                <td>{{ $category->id }}</td>
                <td>{{ $category->name }}</td>
                <td>
                    @if ($category->parent_id == null)
                        Главная категория
                    @else
                        {{ $category->parent->name }}
                    @endif
                </td>
                <td>{!! htmlspecialchars_decode($category->description) !!}</td>
                <td>
                    <a href="/admin/category/show/{{ $category->id }}">Подробнее</a>
                    <a href="/admin/category/update/{{ $category->id }}">Редактировать</a>
                    <a href="/admin/category/delete/{{ $category->id }}" onClick="return window.confirm('Удалить категорию {{ $category->name }}?');">Удалить</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
