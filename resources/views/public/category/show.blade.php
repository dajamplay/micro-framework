@extends('layouts.catalog')

@section('content')
    <main class="main">
        <div class="container">
            <div class="main__inner">
                <div class="main__nav__inner">
                    <aside class="main__nav">
                        <ul>
                            @foreach($categoriesMenu as $categoryMenu)
                                <li data-id="{{$categoryMenu->id}}"><a href="/category/{{$categoryMenu->id}}">{{$categoryMenu->name}}</a></li>
                            @endforeach
                        </ul>
                    </aside>
                </div>
                <section class="main__content section_category">

                    <div class="main__h1">
                        <h1>Профессиональная косметика - {{ $category->name }}</h1>
                        @if($category->image)
                            <div class="card__img">
                                <img src="/uploads/{{$category->image}}" alt="">
                            </div>
                        @endif
                        <p>{!! htmlspecialchars_decode($category->description) !!}</p>
                    </div>

                    @foreach($categories as $cat)
                        <div class="main__h1_table">
                            <h2>{{$cat->name}}</h2>
                            @if($cat->description)
                                <p>{{$cat->description}}</p>
                            @endif
                        </div>
                        <div class="cards-table">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th class="category_thead_name">Наименование</th>
                                    <th class="category_thead_size">Объем (мл)</th>
                                    <th class="category_thead_price">Стоимость</th>
                                    <th class="category_thead_price_opt">Стоимость (оптовая)</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($products as $product)
                                    @if($product->category_id == $cat->id)
                                        <tr>
                                            <td class="category_tbody_name"><a href="/product/{{$product->id}}">{{$product->name}}</a></td>
                                            <td class="category_tbody_size">{{$product->size?:null}}</td>
                                            @if($product->price && config('site.price'))
                                                <td class="category_tbody_price"><b>{{$product->price . " Руб."}}</b></td>
                                            @else
                                                <td class="category_tbody_price"><b>По запросу</b></td>
                                            @endif
                                            @if($product->price_opt && config('site.price_opt'))
                                                <td class="category_tbody_price_opt"><b>{{$product->price_opt . " Руб."}}</b></td>
                                            @else
                                                <td class="category_tbody_price_opt"><b>По запросу</b></td>
                                            @endif
                                        </tr>
                                    @endif
                                @endforeach
                                </tbody>
                            </table>
                            <br>
                        </div>
                    @endforeach
                </section>
            </div>
        </div>
    </main>
@endsection