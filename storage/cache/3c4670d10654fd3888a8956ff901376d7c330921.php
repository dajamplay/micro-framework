

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
                        <h1>Профессиональная косметика - <?php echo e($category->name); ?></h1>
                        <?php if($category->image): ?>
                            <div class="card__img">
                                <img src="/img/brands/<?php echo e($category->image); ?>" alt="">
                            </div>
                        <?php endif; ?>
                        <p><?php echo e($category->description); ?></p>
                    </div>

                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="main__h1_table">
                            <h2><?php echo e($cat->name); ?></h2>
                            <?php if($cat->description): ?>
                                <p><?php echo e($cat->description); ?></p>
                            <?php endif; ?>
                        </div>
                        <div class="cards-table">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>Наименование</th>
                                    <th>Объем (мл)</th>
                                    <th>Стоимость (Руб)</th>
                                    <th>Стоимость оптовая (Руб)</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($product->category_id == $cat->id): ?>
                                        <tr>
                                            <td><a href="/product/<?php echo e($product->id); ?>"><?php echo e($product->name); ?></a></td>
                                            <td><?php echo e($product->size?:null); ?></td>
                                            <td><?php echo e($product->price?:null); ?></td>
                                            <td><?php echo e($product->price_opt?:null); ?></td>
                                        </tr>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>




























                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                </section>
            </div>
        </div>
    </main>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.catalog', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\OSPanel\domains\finaldiplom\resources\views/public/category/show.blade.php ENDPATH**/ ?>