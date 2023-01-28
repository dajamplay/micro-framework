<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Панель администратора</title>
</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-12">
            <h1>Админка</h1>
            <?php if(\App\Support\Session\Session::has('flash_message')): ?>
                <div class="alert alert-success"><?php echo e(\App\Support\Session\Session::get('flash_message')); ?></div>
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
</html><?php /**PATH C:\DiplomPHP\F\resources\views/layouts/admin.blade.php ENDPATH**/ ?>