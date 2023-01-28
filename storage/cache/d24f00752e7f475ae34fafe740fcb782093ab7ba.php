

<?php $__env->startSection('content'); ?>
    <main class="main">
        <div class="container">
            <div class="main__inner">
                <div class="main__nav__inner">
                    <aside class="main__nav">
                        <ul>
                            <?php $__currentLoopData = $categoriesMenu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categoryMenu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><a href="/category/<?php echo e($categoryMenu->id); ?>"><?php echo e($categoryMenu->name); ?></a></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </aside>
                </div>
                <section class="main__content">
                    <div class="main__h1">
                        <h1><?php echo e($product->name); ?></h1>
                        <p>Линия: <?php echo e($category->name); ?></p>
                        <?php if($product->description): ?>
                            <p>Описание: <?php echo e($product->description); ?></p>
                        <?php endif; ?>
                        <p>Объем: <?php echo e($product->size); ?></p>
                        <p>Стоимость: <?php echo e($product->price); ?> Руб.</p>
                        <p>Стоимость(оптовая): по запросу</p>
                        <h3>Заказать <?php echo e($product->name); ?></h3>
                        <form method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Телефон</label>
                                <input type="text" class="form-control" name="tel" required>
                            </div>
                            <div class="form-group">
                                <label>Электронная почта</label>
                                <input type="email" class="form-control" name="email" required>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success">Отправить заявку</button>
                            </div>
                        </form>
                    </div>

                </section>
            </div>
        </div>
    </main>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.catalog', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\OSPanel\domains\finaldiplom\resources\views/public/product/show.blade.php ENDPATH**/ ?>