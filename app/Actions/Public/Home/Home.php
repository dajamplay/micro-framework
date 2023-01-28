<?php

namespace App\Actions\Public\Home;

use App\Actions\Action;
use App\Models\Category\Category;
use Psr\Http\Message\ResponseInterface;

class Home extends Action
{
    public function __invoke(): ResponseInterface
    {
        return $this->render('public.home.index',
            [
                'categoriesMenu' => Category::all()
                    ->where('parent_id', '=', 0)
            ]);
    }
}