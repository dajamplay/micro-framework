

<?php $__env->startSection('content'); ?>
    <hr>
    <h3>Список категорий</h3>
    <hr>
    <table class="table table-bordered">
        <thead class="thead-light">
        <tr><th>ID</th><th>Наименование</th><th>Родительская категория</th><th>Описание</th><th>Действия</th></tr>
        </thead>
        <tbody>
        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($category->id); ?></td>
                <td><?php echo e($category->name); ?></td>
                <td>
                    <?php if($category->parent_id == null): ?>
                        Главная категория
                    <?php else: ?>
                        <?php echo e($category->parent->name); ?>

                    <?php endif; ?>
                </td>
                <td><?php echo htmlspecialchars_decode($category->description); ?></td>
                <td>
                    <a href="/admin/category/show/<?php echo e($category->id); ?>">Подробнее</a>
                    <a href="/admin/category/update/<?php echo e($category->id); ?>">Редактировать</a>
                    <a href="/admin/category/delete/<?php echo e($category->id); ?>" onClick="return window.confirm('Удалить категорию <?php echo e($category->name); ?>?');">Удалить</a>
                </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/u1783479/data/www/eleanta.ru/resources/views/admin/category/home.blade.php ENDPATH**/ ?>