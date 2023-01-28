<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/css/admin.css">
    <title>Панель администратора</title>
</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="admin__header__wrap">
                <div class="admin__header__logo">
                    <a href="/">
                        <img src="/img/logo.png" alt="Елеанта" width="150">
                    </a>
                </div>
                <div class="admin__header__name"> - панель администратора</div>
            </div>
            <div class="admin__header__menu">
                <div class="admin__header__menuitem">
                    <a href="/admin/home" type="button" class="btn btn-success">Главная</a>
                </div>
                <div class="admin__header__menuitem">
                    <a href="/admin/category/home" type="button" class="btn btn-success">Категории</a>
                </div>
                <div class="admin__header__menuitem">
                    <a href="/admin/product/home" type="button" class="btn btn-success">Продукция</a>
                </div>
                <div class="admin__header__menuitem">
                    <a href="/admin/excel/home" type="button" class="btn btn-success">Загрузить из Excel файла</a>
                </div>
                <div class="admin__header__menuitem">
                    <a href="/admin/category/create" type="button" class="btn btn-success">Создать категорию</a>
                </div>
                <div class="admin__header__menuitem">
                    <a href="/admin/product/create" type="button" class="btn btn-success">Создать продукт</a>
                </div>
                <div class="admin__header__menuitem">
                    <form method="POST" action="/admin/out">
                        <button type="submit" class="btn btn-warning">Выход</button>
                    </form>
                </div>
            </div>

        </div>
    </div>

    <div class="row">
        <div class="col-12">
            @if (\App\Support\Session\Session::hasFlash('flash_message'))
                <div class="alert alert-success">{{ \App\Support\Session\Session::getFlash('flash_message') }}</div>
            @endif
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            @yield('content')
        </div>
    </div>

</div>
<script type="text/javascript" src="/assets/js/tinymce/tinymce.min.js"></script>
<script type="text/javascript">
    tinymce.init({
        selector: 'textarea',
        language: 'ru',
        menubar: false,
        plugins: 'lists',
        toolbar: [
            { name: 'history', items: [ 'undo', 'redo' ] },
            { name: 'formatting', items: [ 'forecolor', 'bold', 'italic' , 'underline'] },
            { name: 'alignment', items: [ 'alignleft', 'aligncenter', 'alignright', 'alignjustify' ] },
            { name: 'indentation', items: [ 'outdent', 'indent' ] },
            { name: 'lists', items: [ 'numlist' , 'bullist' ] }

        ],
        branding: false
    });
</script>
</body>
</html>