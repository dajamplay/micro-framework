<?php


namespace App\Actions\Admin\Category;


use App\Actions\Action;
use App\Models\Category\Category;
use Psr\Http\Message\ResponseInterface;

class ShowCategory extends Action
{
    public function __invoke($id): ResponseInterface
    {
        $category = Category::all()->where('id','=', $id)->first();
        return $this->render('admin.category.show', ['category' => $category]);
    }
}