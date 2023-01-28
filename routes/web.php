<?php

/**
 * Routing
 * @var FastRoute\RouteCollector $router
 */

/**
 * Public
 */
$router->get('/', [\App\Actions\Public\Home\Home::class]);
$router->get('/category/{id:\d+}', [\App\Actions\Public\Category\ShowCategory::class]);
$router->addRoute(['POST', 'GET'],'/product/{id:\d+}', [\App\Actions\Public\Product\ShowProduct::class]);

/** Public - pages */
$router->get('/about', [\App\Actions\Public\Pages\About::class]);
$router->get('/delivery', [\App\Actions\Public\Pages\Delivery::class]);
$router->get('/contacts', [\App\Actions\Public\Pages\Contacts::class]);

/**
 * Administrator
 */
$router->get('/admin/home', [\App\Actions\Admin\Home\Home::class]);
$router->addRoute(['POST', 'GET'], '/admin-login', [\App\Actions\Admin\Auth\Login::class]);
$router->post('/admin/out', [\App\Actions\Admin\Auth\Out::class]);

/** Administrator - category */
$router->addRoute(['POST', 'GET'], '/admin/category/home', [\App\Actions\Admin\Category\HomeCategory::class]);
$router->addRoute(['POST', 'GET'], '/admin/category/create', [\App\Actions\Admin\Category\CreateCategory::class]);
$router->addRoute(['POST', 'GET'], '/admin/category/show/{id:\d+}', [\App\Actions\Admin\Category\ShowCategory::class]);
$router->addRoute(['POST', 'GET'], '/admin/category/update/{id:\d+}', [\App\Actions\Admin\Category\UpdateCategory::class]);
$router->addRoute(['POST', 'GET'], '/admin/category/delete/{id:\d+}', [\App\Actions\Admin\Category\DeleteCategory::class]);

/** Administrator - product */
$router->addRoute(['POST', 'GET'], '/admin/product/home', [\App\Actions\Admin\Product\HomeProduct::class]);
$router->addRoute(['POST', 'GET'], '/admin/product/create', [\App\Actions\Admin\Product\CreateProduct::class]);
$router->addRoute(['POST', 'GET'], '/admin/product/show/{id:\d+}', [\App\Actions\Admin\Product\ShowProduct::class]);
$router->addRoute(['POST', 'GET'], '/admin/product/update/{id:\d+}', [\App\Actions\Admin\Product\UpdateProduct::class]);
$router->addRoute(['POST', 'GET'], '/admin/product/delete/{id:\d+}', [\App\Actions\Admin\Product\DeleteProduct::class]);

/** Administrator - Excel */
$router->addRoute(['POST', 'GET'], '/admin/excel/home', [\App\Actions\Admin\Excel\HomeExcel::class]);

/** Administrator - Gallery */
$router->addRoute(['POST', 'GET'], '/admin/gallery/home', [\App\Actions\Admin\Gallery\HomeGallery::class]);