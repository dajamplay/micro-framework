@extends('layouts.admin')

@section('content')
    <hr>
    <h3>Главная</h3>
    <hr>
    <h4>Всего категорий:
        @if(isset($categoryCount))
            {{$categoryCount}} шт.
        @else
            Нет
        @endif
    </h4>
    <h4>Всего продукции:
        @if(isset($productCount))
            {{$productCount}} шт.
        @else
            Нет
        @endif
    </h4>
    <h4>Всего страниц:
        @if(isset($productCount) && isset($categoryCount))
            {{$productCount + $categoryCount + 5}} шт.
        @else
            5
        @endif
    </h4>
    <hr>
@endsection