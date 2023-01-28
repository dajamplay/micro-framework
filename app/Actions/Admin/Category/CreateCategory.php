<?php

namespace App\Actions\Admin\Category;

use App\Actions\Action;
use App\Models\Category\Category;
use App\Support\Session\Session;
use Psr\Http\Message\ResponseInterface;

class CreateCategory extends Action
{
    public function __invoke(): ResponseInterface
    {
        $rootCategories = Category::all()->where('parent_id','=', null);

        if ($this->request->getMethod() == 'POST') {
            $params = $this->request->getParsedBody();

            $category = Category::create([
                'name' => $params['name'],
                'parent_id' => $params['parent_id'],
                'description' => $params['description'],
            ]);

            $uploadedImage = $this->getUploadedFile('image');
            if ($uploadedImage->getError() == UPLOAD_ERR_OK) {
                $fileName = $this->moveUploadedFile(config('site.uploads'), $uploadedImage);
                $category->image = $fileName;
            }

            if ($category->save()) {
                Session::putFlash('flash_message', 'Категория создана');
            } else {
                Session::putFlash('flash_message', 'ОШИБКА');
            }

        }

        return $this->render('admin.category.create', [ 'rootCategories' => $rootCategories]);
    }
}