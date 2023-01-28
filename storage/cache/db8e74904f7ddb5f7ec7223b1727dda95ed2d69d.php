
<header class="header">
    <div class="container">
        <div class="header__inner">
            <div class="header__logo">
                <a href="/">
                    <img src="/img/logo.png" alt="Елеанта">
                </a>
            </div>
            <nav class="header__nav">
                <div class="menu_toggle">
                    <div class="menu_toggle_line"></div>
                </div>
                <div class="header_menu">
                    <ul>
                        <li class="link_home"><a href="/">Главная</a></li>
                        <li><a href="/about">О компании</a></li>
                        <li><a href="/category/1">Продукция</a></li>
                        <li class="categories__menu">
                            <ul>
                                <?php $__currentLoopData = $categoriesMenu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categoryMenu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><a href="/category/<?php echo e($categoryMenu->id); ?>"><?php echo e($categoryMenu->name); ?></a></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </li>
                        <li><a href="/delivery">Оплата и доставка</a></li>
                        <li><a href="/contacts">Контакты</a></li>
                    </ul>
                </div>
            </nav>
            <div class="header__auth">
                <div>+7(911)744-78-88</div>
                <div>+7(911)940-66-95</div>
            </div>
        </div>
    </div>
</header><?php /**PATH /var/www/u1783479/data/www/eleanta.ru/resources/views/partials/header.blade.php ENDPATH**/ ?>