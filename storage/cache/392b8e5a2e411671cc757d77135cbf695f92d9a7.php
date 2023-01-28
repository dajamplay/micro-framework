

<?php $__env->startSection('content'); ?>
    <h2>Excel</h2>
    <form method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="exampleFormControlSelect1">Категория для загрузки</label>
            <select class="form-control" id="exampleFormControlSelect1" name="category_id" required>
                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
        <div class="form-group">
            <label>Файл Excel</label>
            <input type="file" class="form-control" name="excel_file" required>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-success">Загрузить файл</button>
        </div>
    </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\OSPanel\domains\finaldiplom\resources\views/admin/excel/home.blade.php ENDPATH**/ ?>