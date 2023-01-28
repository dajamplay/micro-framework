<?php

namespace App\Actions\Admin\Home;

use App\Actions\Action;

use App\Models\Category\Category;
use App\Models\Product\Product;
use Psr\Http\Message\ResponseInterface;

class Home extends Action
{
    public function __invoke(): ResponseInterface
    {
        $productCount = Product::all()->count();
        $categoryCount = Category::all()->count();
        return $this->render('admin.home.index', [
            "productCount" => $productCount,
            "categoryCount" => $categoryCount
        ]);
    }
}