

<?php $__env->startSection('content'); ?>
    <hr>
    <h3>Обновить категорию - <?php echo e($category->name); ?></h3>
    <hr>
    <form method="post" enctype="multipart/form-data">
        <div class="form-group">
            <input type="text" class="form-control" name="id" value="<?php echo e($category->id); ?>" hidden>
        </div>
        <div class="form-group">
            <label>Имя категории</label>
            <input type="text" class="form-control" name="name" value="<?php echo e($category->name); ?>">
        </div>
        <div class="form-group">
            <label for="exampleFormControlSelect1">Родительская категория</label>
            <select class="form-control" id="exampleFormControlSelect1" name="parent_id">
                <option value="0">Главная категория</option>
                <?php $__currentLoopData = $rootCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($category->parent_id == $cat->id): ?>
                        <option value="<?php echo e($cat->id); ?>" selected><?php echo e($cat->name); ?></option>
                    <?php else: ?>
                        <option value="<?php echo e($cat->id); ?>"><?php echo e($cat->name); ?></option>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
        <div class="form-group">
            <label>Иыбрать новое изображение</label>
            <input type="file" class="form-control" name="image">
            <p><img height="150px" src="/uploads/category/<?php echo e($category->image); ?>"></p>
        </div>
        <div class="form-group">
            <label>Описание</label>
            <textarea class="form-control" rows="3" name="description"><?php echo e($category->description); ?></textarea>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-success">Обновить категорию</button>
        </div>
    </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OpenServer\domains\finaldiplom\resources\views/admin/category/update.blade.php ENDPATH**/ ?>