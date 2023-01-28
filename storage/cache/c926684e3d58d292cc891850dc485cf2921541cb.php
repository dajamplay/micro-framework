

<?php $__env->startSection('content'); ?>
    <hr>
    <h3><?php echo e($product->name); ?></h3>
    <hr>
    <table class="table table-bordered">
        <thead class="thead-light">
        <tr>
            <th>ID</th>
            <th>Название</th>
            <th>Категория</th>
            <th>Объем</th>
            <th>Цена</th>
            <th>Цена опт</th>
            <th>Описание</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td><?php echo e($product->id); ?></td>
            <td><?php echo e($product->name); ?></td>
            <td><?php echo e($product->category->parent->name); ?> | <?php echo e($product->category->name); ?></td>
            <td><?php echo e($product->size); ?></td>
            <td><?php echo e($product->price); ?></td>
            <td><?php echo e($product->price_opt); ?></td>
            <td><?php echo e($product->description); ?></td>
        </tr>
        </tbody>
    </table>
    <a href="/admin/product/update/<?php echo e($product->id); ?>" class="btn btn-primary">Редактировать</a>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/u1783479/data/www/eleanta.ru/resources/views/admin/product/show.blade.php ENDPATH**/ ?>