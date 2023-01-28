@extends('layouts.catalog')

@section('content')
    <main class="main">
        <div class="container">
            <div class="main__inner">
                <section class="main__content">
                    <div class="main__h1 single__page">
                        <h1>Контакты</h1>
                        <hr>
                        <p>197110, Санкт-Петербург, ул. Большая Разночинная, дом 14, офис 516</p>
                        <p>Бизнес-центр "Бизнес Депо"</p>
                        <p>Ст.М. "Чкаловская"</p>
                        <p>Тел: +7(911)744-78-88, +7(911)940-66-95</p>
                        <p>E-mail: eleanta@yandex.ru</p>
                        <hr>
                        <div class="map_wrap">
                            <script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3Afe87167dbac9cf72de4125c5fd85572fe53a708fe95801a4364f4e7811b2f8c4&amp;width=100%25&amp;height=400&amp;lang=ru_RU&amp;scroll=false"></script>
                        </div>
                        <br>
                    </div>
                </section>
            </div>
        </div>
    </main>
@endsection