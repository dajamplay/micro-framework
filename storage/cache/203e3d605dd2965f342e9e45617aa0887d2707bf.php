

<?php $__env->startSection('content'); ?>
    <h2>Главная страница</h2>
    <a href="/admin/product/create" type="button" class="btn btn-success">Создать продукт</a>
    <a href="/admin/category/create" type="button" class="btn btn-success">Создать категорию</a>
    <a href="/admin/excel/home" type="button" class="btn btn-success">Загрузить из Excel файла</a>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\OSPanel\domains\finaldiplom\resources\views/admin/home/index.blade.php ENDPATH**/ ?>