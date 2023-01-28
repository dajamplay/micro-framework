

<?php $__env->startSection('content'); ?>
    <h2>Продукт - <?php echo e($product->name); ?> - удален</h2>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OpenServer\domains\finaldiplom\resources\views/admin/product/delete.blade.php ENDPATH**/ ?>