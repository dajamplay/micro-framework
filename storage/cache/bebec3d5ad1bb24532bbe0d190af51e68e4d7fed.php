

<?php $__env->startSection('content'); ?>
    <hr>
    <h3>Обновить продукт - <?php echo e($product->name); ?></h3>
    <hr>
    <form method="post" enctype="multipart/form-data">
        <div class="form-group">
            <input type="text" class="form-control" name="id" value="<?php echo e($product->id); ?>" hidden>
        </div>
        <div class="form-group">
            <label>Наименование продукта</label>
            <input type="text" class="form-control" name="name" value="<?php echo e($product->name); ?>">
        </div>
        <div class="form-group">
            <label for="exampleFormControlSelect1">Категория</label>
            <select class="form-control" id="exampleFormControlSelect1" name="category_id">
                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($category->id == $product->category_id): ?>
                        <option value="<?php echo e($category->id); ?>" selected><?php echo e($category->name); ?></option>
                    <?php else: ?>
                        <option value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>

        <div class="form-group">
            <label>Изображение</label>
            <input type="file" class="form-control" name="image" value="<?php echo e($product->image); ?>">
        </div>

        <div class="form-group">
            <label>Объем</label>
            <input type="text" class="form-control" name="size" value="<?php echo e($product->size); ?>">
        </div>

        <div class="form-group">
            <label>Цена</label>
            <input type="text" class="form-control" name="price" value="<?php echo e($product->price); ?>">
        </div>

        <div class="form-group">
            <label>Цена опт</label>
            <input type="text" class="form-control" name="price_opt" value="<?php echo e($product->price_opt); ?>">
        </div>

        <div class="form-group">
            <label>Описание</label>
            <textarea class="form-control" rows="3" name="description" ><?php echo e($product->description); ?></textarea>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-success">Обновить продукт</button>
        </div>
    </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/u1783479/data/www/eleanta.ru/resources/views/admin/product/update.blade.php ENDPATH**/ ?>