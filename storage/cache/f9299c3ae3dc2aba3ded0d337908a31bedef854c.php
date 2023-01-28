

<?php $__env->startSection('content'); ?>
    <hr>
    <h3>Категория - <?php echo e($category->name); ?> - удалена</h3>
    <hr>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/u1783479/data/www/eleanta.ru/resources/views/admin/category/delete.blade.php ENDPATH**/ ?>