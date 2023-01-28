

<?php $__env->startSection('content'); ?>
    <main class="main">
        <div class="container">
            <div class="main__inner single__product__inner">
                <div class="main__nav__inner single__product">
                    <aside class="main__nav">
                        <ul>
                            <?php $__currentLoopData = $categoriesMenu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categoryMenu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li data-id="<?php echo e($categoryMenu->id); ?>"><a href="/category/<?php echo e($categoryMenu->id); ?>"><?php echo e($categoryMenu->name); ?></a></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </aside>
                </div>

                <section class="main__content single__product__main__content">
                    <div class="main__h1 single__product__h1">
                        <?php if(\App\Support\Session\Session::hasFlash('flash_message')): ?>
                            <br>
                            <div class="alert alert-success"><?php echo e(\App\Support\Session\Session::getFlash('flash_message')); ?></div>
                        <?php endif; ?>
                        <br>
                        <table class="table table_single_product">
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
                                    <td>Объем(мл)</td>
                                    <td><b><?php echo e($product->size); ?></b></td>
                                </tr>
                                <?php if($product->description): ?>
                                    <tr>
                                        <td>Описание</td>
                                        <td><b><?php echo htmlspecialchars_decode($product->description); ?></b></td>
                                    </tr>
                                <?php endif; ?>
                                <tr>
                                    <td>Стоимость</td>
                                    <?php if($product->price && config('site.price')): ?>
                                        <td><b><?php echo e($product->price . " Руб."); ?></b></td>
                                    <?php else: ?>
                                        <td><b>По запросу</b></td>
                                    <?php endif; ?>
                                </tr>
                                <tr>
                                    <td>Стоимость(оптовая)</td>
                                    <?php if($product->price_opt && config('site.price_opt')): ?>
                                        <td><b><?php echo e($product->price_opt . " Руб."); ?></b></td>
                                    <?php else: ?>
                                        <td><b>По запросу</b></td>
                                    <?php endif; ?>
                                </tr>
                            </tbody>
                        </table>
                        <br>
                        <hr>
                            <?php if($product->image): ?>
                                <div class="product_img">
                                    <img src="<?php echo e($product->image); ?>" alt="">
                                </div>
                                <hr>
                            <?php endif; ?>
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
                                <div style="text-align: center"><button type="submit" class="hero__btn" disabled>Оставить заявку</button></div>
                            </form>
                        </div>

                        <br>
                    </div>

                </section>
            </div>
        </div>
    </main>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.catalog', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/u1783479/data/www/eleanta.ru/resources/views/public/product/show.blade.php ENDPATH**/ ?>