

<?php $__env->startSection('content'); ?>
    <hr>
    <h3>Главная</h3>
    <hr>
    <h4>Всего категорий:
        <?php if(isset($categoryCount)): ?>
            <?php echo e($categoryCount); ?> шт.
        <?php else: ?>
            Нет
        <?php endif; ?>
    </h4>
    <h4>Всего продукции:
        <?php if(isset($productCount)): ?>
            <?php echo e($productCount); ?> шт.
        <?php else: ?>
            Нет
        <?php endif; ?>
    </h4>
    <h4>Всего страниц:
        <?php if(isset($productCount) && isset($categoryCount)): ?>
            <?php echo e($productCount + $categoryCount + 5); ?> шт.
        <?php else: ?>
            5
        <?php endif; ?>
    </h4>
    <hr>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OpenServer\domains\finaldiplom\resources\views/admin/home/index.blade.php ENDPATH**/ ?>