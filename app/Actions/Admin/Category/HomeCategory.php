<?php

namespace App\Actions\Admin\Category;

use App\Actions\Action;
use App\Models\Category\Category;
use Psr\Http\Message\ResponseInterface;

class HomeCategory extends Action
{
    public function __invoke(): ResponseInterface
    {
        $categories = Category::all();
        return $this->render('admin.category.home', ['categories' => $categories]);
    }
}