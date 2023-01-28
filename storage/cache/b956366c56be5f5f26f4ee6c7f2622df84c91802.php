

<?php $__env->startSection('content'); ?>
    <hr>
    <h3>Создать продукт</h3>
    <hr>
    <form method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label>Наименование продукта</label>
            <input type="text" class="form-control" name="name">
        </div>
        <div class="form-group">
            <label for="exampleFormControlSelect1">Категория</label>
            <select class="form-control" id="exampleFormControlSelect1" name="category_id">
                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>

        <div class="form-group">
            <label>Изображение</label>
            <input type="file" class="form-control" name="image">
        </div>

        <div class="form-group">
            <label>Объем</label>
            <input type="text" class="form-control" name="size">
        </div>

        <div class="form-group">
            <label>Цена</label>
            <input type="text" class="form-control" name="price">
        </div>

        <div class="form-group">
            <label>Цена опт</label>
            <input type="text" class="form-control" name="price_opt">
        </div>

        <div class="form-group">
            <label>Описание</label>
            <textarea class="form-control" rows="3" name="description"></textarea>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-success">Создать продукт</button>
        </div>
    </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OpenServer\domains\finaldiplom\resources\views/admin/product/create.blade.php ENDPATH**/ ?>