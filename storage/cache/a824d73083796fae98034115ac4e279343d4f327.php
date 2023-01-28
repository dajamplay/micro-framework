<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <title>Панель администратора</title>
</head>
<body>


<div class="container">
    <form method="POST" action="/admin/out">
        <button type="submit">Выход</button>
    </form>
    <div class="row">
        <div class="col-12">
            <div>Панель администратора</div>
            <a href="/admin/home">Главная</a>
            <a href="/admin/category/home">Категории</a>
            <a href="/admin/product/home">Продукция</a>
            <a href="/admin/excel/home">Загрузить из Excel файла</a>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <?php if(\App\Support\Session\Session::hasFlash('flash_message')): ?>
                <div class="alert alert-success"><?php echo e(\App\Support\Session\Session::getFlash('flash_message')); ?></div>
            <?php endif; ?>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <?php echo $__env->yieldContent('content'); ?>
        </div>
    </div>

</div>

</body>
</html><?php /**PATH D:\OSPanel\domains\finaldiplom\resources\views/layouts/admin.blade.php ENDPATH**/ ?>