

<?php $__env->startSection('content'); ?>
    <h2>Категория - <?php echo e($category->name); ?> - удалена</h2>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OpenServer\domains\finaldiplom\resources\views/admin/category/delete.blade.php ENDPATH**/ ?>