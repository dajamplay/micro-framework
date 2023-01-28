

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
                        <?php if(\App\Support\Session\Session::hasFlash('flash_message')): ?>
                            <br>
                            <div class="alert alert-success"><?php echo e(\App\Support\Session\Session::getFlash('flash_message')); ?></div>
                        <?php endif; ?>
                        <br>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Производитель</th>
                                    <th><h1><?php echo e($category->parent->name); ?></h1></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Наименование</td>
                                    <td><b><?php echo e($product->name); ?></b></td>
                                </tr>
                                <tr>
                                    <td>Линия</td>
                                    <td><b><?php echo e($category->name); ?></b></td>
                                </tr>
                                <tr>
                                    <td>Объем</td>
                                    <td><b><?php echo e($product->size); ?></b></td>
                                </tr>
                                <?php if($product->description): ?>
                                    <tr>
                                        <td>Описание</td>
                                        <td><b><?php echo e($product->description); ?></b></td>
                                    </tr>
                                <?php endif; ?>
                                <?php if($product->price): ?>
                                    <tr>
                                        <td>Стоимость</td>
                                        <td><b><?php echo e($product->price); ?> Руб.</b></td>
                                    </tr>
                                <?php endif; ?>
                                <tr>
                                    <td>Стоимость(оптовая)</td>
                                    <td><b>По запросу</b></td>
                                </tr>
                            </tbody>
                        </table>
                        <br>
                        <hr>
                        <h3>Оставьте заявку и менеджеры нашей компании свяжутся с вами</h3>
                        <div style="margin-left: 15px;">
                            <form method="post" enctype="multipart/form-data">
                                <input type="text" name="productName" value="<?php echo e($product->name); ?>" hidden>
                                <table>
                                    <tr>
                                        <td><label>Телефон</label></td>
                                        <td><input type="text" class="form-control" name="tel" required></td>
                                    </tr>
                                    <tr>
                                        <td><label>Электронная почта</label></td>
                                        <td><input type="email" class="form-control" name="email" required></td>
                                    </tr>
                                    <tr>
                                        <td><label>Комментарий к заказу</label></td>
                                        <td><textarea rows="10" cols="45" type="text" class="form-control" name="text"></textarea></td>
                                    </tr>
                                </table>
                                <div style="text-align: center"><button type="submit" class="hero__btn">Оставить заявку</button></div>
                            </form>
                        </div>

                        <br>
                    </div>

                </section>
            </div>
        </div>
    </main>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.catalog', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OpenServer\domains\finaldiplom\resources\views/public/product/show.blade.php ENDPATH**/ ?>