<?php

namespace App\Actions\Admin\Product;

use App\Actions\Action;
use App\Models\Category\Category;
use App\Models\Product\Product;
use App\Support\Session\Session;
use Psr\Http\Message\ResponseInterface;

class CreateProduct extends Action
{
    public function __invoke(): ResponseInterface
    {
        $categories = Category::all()->where('parent_id','>', 0);

        if ($this->request->getMethod() == 'POST') {
            $params = $this->request->getParsedBody();
            $product = Product::create([
                'name' => $params['name'],
                'category_id' => $params['category_id'],
                'size' => $params['size'] ?: null,
                'price' => $params['price'] ?: null,
                'price_opt' => $params['price_opt'] ?: null,
                'description' => $params['description'] ?: null,
            ]);
            if ($product->save()) {
                Session::putFlash('flash_message', 'Продукт создан');
            }
        }

        return $this->render('admin.product.create', [ 'categories' => $categories]);
    }
}