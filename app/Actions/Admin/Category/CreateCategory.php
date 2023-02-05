<?php

namespace App\Actions\Admin\Category;

use App\Actions\Action;
use App\Models\Category\Category;
use App\Services\FileUploader\FileUploader;
use App\Support\Session\Session;
use Psr\Http\Message\ResponseInterface;

class CreateCategory extends Action
{
    public function __invoke(FileUploader $fileUploader): ResponseInterface
    {
        if ($this->request->getMethod() == 'POST') {

            $params = $this->request->getParsedBody();

            $category = Category::create([
                'name' => $params['name'],
                'parent_id' => $params['parent_id'],
                'description' => $params['description'],
                'image' => $fileUploader->uploadImages($this->request->getUploadedFiles(), config('path.uploads'), 'images')
            ]);

            if ($category->save()) {
                Session::putFlash('flash_message', 'Категория создана');
            }
        }

        return $this->render('admin.category.create', [
            'rootCategories' => Category::getRootCategories()
        ]);
    }
}