<?php

namespace App\Actions\Admin\Category;

use App\Actions\Action;
use App\Models\Category\Category;
use App\Support\Session\Session;
use Psr\Http\Message\ResponseInterface;

class DeleteCategory extends Action
{
    public function __invoke($id): ResponseInterface
    {
        if ($category = Category::find($id)) {
            $category->delete();
            Category::where('parent_id', '=', $id)->delete();
        }

        return $this->render('admin.category.delete', [
            'category' => $category,
        ]);
    }
}