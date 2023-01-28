@extends('layouts.catalog')

@section('content')
    <main class="main">
        <div class="container">
            <div class="main__inner single__product__inner">
                <div class="main__nav__inner single__product">
                    <aside class="main__nav">
                        <ul>
                            @foreach($categoriesMenu as $categoryMenu)
                                <li data-id="{{$categoryMenu->id}}"><a href="/category/{{$categoryMenu->id}}">{{$categoryMenu->name}}</a></li>
                            @endforeach
                        </ul>
                    </aside>
                </div>

                <section class="main__content single__product__main__content">
                    <div class="main__h1 single__product__h1">
                        @if (\App\Support\Session\Session::hasFlash('flash_message'))
                            <br>
                            <div class="alert alert-success">{{ \App\Support\Session\Session::getFlash('flash_message') }}</div>
                            <br>
                        @endif


                        <table class="table">
                            <thead>
                            <tr>
                                <th style="border-top-left-radius: 30px;" colspan="2"><h1>{{ $category->parent->name }}: {{ $product->name }}</h1></th>
                            </tr>
                            </thead>
                            <tbody>

                                <tr>
                                    <td colspan="1">
                                        @if($product->image)
                                            <div class="product_img">
                                                <img src="{{$product->image}}" alt="{{$product->name}}">
                                            </div>
                                        @endif
                                    </td>
                                    <td>
                                        @if($product->description)
                                            <div><b>{!! htmlspecialchars_decode($product->description) !!}</b></div>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>Линия</td>
                                    <td><b>{{ $category->name }}</b></td>
                                </tr>
                                <tr>
                                    <td>Объем(мл)</td>
                                    <td><b>{{ $product->size }}</b></td>
                                </tr>
                                <tr>
                                    <td>Стоимость</td>
                                    @if($product->price && config('site.price'))
                                        <td><b>{{$product->price . " Руб."}}</b></td>
                                    @else
                                        <td><b>По запросу</b></td>
                                    @endif
                                </tr>
                                <tr>
                                    <td>Стоимость(оптовая)</td>
                                    @if($product->price_opt && config('site.price_opt'))
                                        <td><b>{{$product->price_opt . " Руб."}}</b></td>
                                    @else
                                        <td><b>По запросу</b></td>
                                    @endif
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </section>
            </div>
        </div>
    </main>
@endsection