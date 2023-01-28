<?php

namespace App\Actions\Admin\Product;

use App\Actions\Action;
use App\Models\Category\Category;
use App\Models\Product\Product;
use App\Support\Session\Session;
use Psr\Http\Message\ResponseInterface;

class UpdateProduct extends Action
{
    public function __invoke($id): ResponseInterface
    {
        if ($this->request->getMethod() == 'POST') {
            $params = $this->request->getParsedBody();
            $product = Product::find($params['id']);
            $product->name = $params['name'];
            $product->category_id = $params['category_id'];
            $product->size = $params['size'] ?: null;
            $product->price = $params['price'] ?: null;
            $product->price_opt = $params['price_opt'] ?: null;
            $product->description = $params['description'] ?: null;
            $product->save();
            Session::putFlash('flash_message', 'Продукт обновлен');
        }

        $product = Product::find($id);
        $categories = Category::all()->where('parent_id','>', 0);

        return $this->render('admin.product.update', [
            'product' => $product,
            'categories' => $categories
        ]);
    }
}