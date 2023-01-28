

<?php $__env->startSection('content'); ?>
    <h2>Страница категории</h2>
    <table class="table table-bordered">
        <thead class="thead-light">
        <tr>
            <th>ID</th>
            <th>Название</th>
            <th>Описание</th>
            <th>Родитель ID</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td><?php echo e($category->id); ?></td>
            <td><?php echo e($category->name); ?></td>
            <td><?php echo e($category->description); ?></td>
            <td><?php echo e($category->parent_id); ?></td>
        </tr>
        </tbody>
    </table>
    <a href="/admin/category/update/<?php echo e($category->id); ?>" class="btn btn-primary">Редактировать</a>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OpenServer\domains\finaldiplom\resources\views/admin/category/show.blade.php ENDPATH**/ ?>