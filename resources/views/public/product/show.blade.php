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
                        @endif
                        <br>
                        <table class="table table_single_product">
                            <thead>
                                <tr>
                                    <th>Производитель</th>
                                    <th><h1>{{ $category->parent->name }}</h1></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Наименование</td>
                                    <td><b>{{ $product->name }}</b></td>
                                </tr>
                                <tr>
                                    <td>Линия</td>
                                    <td><b>{{ $category->name }}</b></td>
                                </tr>
                                <tr>
                                    <td>Объем(мл)</td>
                                    <td><b>{{ $product->size }}</b></td>
                                </tr>
                                @if($product->description)
                                    <tr>
                                        <td>Описание</td>
                                        <td><b>{!! htmlspecialchars_decode($product->description) !!}</b></td>
                                    </tr>
                                @endif
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
                        <br>
                        <hr>
                            @if($product->image)
                                <div class="product_img">
                                    <img src="{{$product->image}}" alt="">
                                </div>
                                <hr>
                            @endif
                        <h3>Оставьте заявку и менеджеры нашей компании свяжутся с вами</h3>
                        <div style="margin-left: 15px;">
                            <form method="post" enctype="multipart/form-data">
                                <input type="text" name="productName" value="{{$product->name}}" hidden>
                                <table>
                                    <tr>
                                        <td><label>Телефон</label></td>
                                        <td><input type="text" class="form-control" name="tel" required></td>
                                    </tr>
                                    <tr>
                                        <td><label>Электронная почта</label></td>
                                        <td><input type="email" class="form-control" name="email" required></td>
                                    </tr>
                                    <tr>
                                        <td><label>Комментарий к заказу</label></td>
                                        <td><textarea rows="10" cols="45" type="text" class="form-control" name="text"></textarea></td>
                                    </tr>
                                </table>
                                <div style="text-align: center"><button type="submit" class="hero__btn" disabled>Оставить заявку</button></div>
                            </form>
                        </div>

                        <br>
                    </div>

                </section>
            </div>
        </div>
    </main>
@endsection