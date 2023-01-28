<?php

namespace App\Actions\Admin\Product;

use App\Actions\Action;
use App\Models\Category\Category;
use App\Models\Product\Product;
use Psr\Http\Message\ResponseInterface;

class HomeProduct extends Action
{
    public function __invoke(): ResponseInterface
    {
        $filter = [];

        if($param = $this->getQueryParam('category_id')) $filter[] = ['category_id', '=', $param];

        if ($filter) {
            $products = Product::where($filter)->get();
        } else {
            $products = Product::all();
        }

        $categories = Category::all();
        return $this->render('admin.product.home', [
            'products' => $products,
            'categories' => $categories
        ]);
    }
}