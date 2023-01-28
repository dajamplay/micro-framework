

<?php $__env->startSection('content'); ?>
    <hr>
    <h3>Список продукции</h3>
    <hr>
    <h4>Фильтр</h4>
    <form method="get">
        <div class="form-group">
            <button type="submit" class="btn btn-success">Очистить фильтр</button>
        </div>
    </form>
    <form method="get">
        <div class="form-group">
            <label for="exampleFormControlSelect1">Категория</label>
            <select class="form-control" id="category_id" name="category_id">
                <option value="">Все</option>
                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($category->parent): ?>
                        <?php if($category->id == $_GET['category_id']): ?>
                            <option value="<?php echo e($category->id); ?>" selected><?php echo e($category->parent->name); ?> | <?php echo e($category->name); ?></option>
                        <?php else: ?>
                            <option value="<?php echo e($category->id); ?>"><?php echo e($category->parent->name); ?> | <?php echo e($category->name); ?></option>
                        <?php endif; ?>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-success">Применить фильтр</button>
        </div>
    </form>
    <table class="table table-bordered">
        <thead class="thead-light">
        <tr>
            <th>ID</th>
            <th>Наименование</th>
            <th>Категория</th>
            <th>Объем</th>
            <th>Цена</th>
            <th>Цена опт</th>
            <th>Описание</th>
            <th>Действия</th>
        </tr>
        </thead>
        <tbody>
        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($product->id); ?></td>
                <td><?php echo e($product->name); ?></td>
                <td><?php echo e($product->category->parent->name); ?> | <?php echo e($product->category->name); ?></td>
                <td><?php echo e($product->size); ?></td>
                <td><?php echo e($product->price); ?></td>
                <td><?php echo e($product->price_opt); ?></td>
                <td><?php echo htmlspecialchars_decode($product->description); ?></td>
                <td>
                    <a href="/admin/product/show/<?php echo e($product->id); ?>">Подробнее</a>
                    <a href="/admin/product/update/<?php echo e($product->id); ?>">Редактировать</a>
                    <a href="/admin/product/delete/<?php echo e($product->id); ?>" onClick="return window.confirm('Удалить продукт - <?php echo e($product->name); ?>?');">Удалить</a>
                </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/u1783479/data/www/eleanta.ru/resources/views/admin/product/home.blade.php ENDPATH**/ ?>