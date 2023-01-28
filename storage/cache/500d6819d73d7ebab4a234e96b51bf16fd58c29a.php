

<?php $__env->startSection('content'); ?>
    <hr>
    <h3>Страница категории</h3>
    <hr>
    <table class="table table-bordered">
        <thead class="thead-light">
        <tr>
            <th>ID</th>
            <th>Название</th>
            <th>Описание</th>
            <th>Родительская категория</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td><?php echo e($category->id); ?></td>
            <td><?php echo e($category->name); ?></td>
            <td><?php echo e($category->description); ?></td>
            <td><?php echo e($category->parent->name ?? 'Главная категория'); ?></td>
        </tr>
        </tbody>
    </table>
    <a href="/admin/category/update/<?php echo e($category->id); ?>" class="btn btn-primary">Редактировать</a>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/u1783479/data/www/eleanta.ru/resources/views/admin/category/show.blade.php ENDPATH**/ ?>