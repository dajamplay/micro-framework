<?php

namespace App\Actions\Public\Pages;

use App\Actions\Action;
use App\Models\Category\Category;
use Psr\Http\Message\ResponseInterface;

class Contacts extends Action
{
    public function __invoke(): ResponseInterface
    {
        return $this->render('public.pages.contacts', [
            'title' => 'Контакты',
            'categoriesMenu' => Category::all()
                ->where('parent_id', '=', 0)
        ]);
    }
}