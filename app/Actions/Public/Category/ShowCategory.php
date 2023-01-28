<?php

namespace App\Actions\Public\Category;

use App\Actions\Action;
use App\Models\Category\Category;
use App\Models\Product\Product;
use Psr\Http\Message\ResponseInterface;

class ShowCategory extends Action
{
    public function __invoke($id): ResponseInterface
    {
        if(!$category = Category::find($id)) return $this->redirect(404);

        $categoriesMenu = Category::all()->where('parent_id', '=', 0);

        $categories = Category::all()->where('parent_id', '=', $id);

        $products = Product::all();

        return $this->render('public.category.show', [
            'category' => $category,
            'categoriesMenu' => $categoriesMenu,
            'categories' => $categories,
            'products' => $products,
            'title' => $category->name
        ]);
    }
}