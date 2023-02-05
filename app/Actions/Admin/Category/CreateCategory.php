<?php

namespace App\Actions\Admin\Category;

use App\Actions\Action;
use App\Models\Category\Category;
use App\Services\FileUploader\FileUploader;
use App\Support\Session\Session;
use Psr\Http\Message\ResponseInterface;

class CreateCategory extends Action
{
    public function __invoke(FileUploader $uploader): ResponseInterface
    {
        if ($this->request->getMethod() == 'POST') {

            $file = $this->request->getUploadedFiles()['image'] ?? null;

            $params = $this->request->getParsedBody();

            $category = Category::create([
                'name' => $params['name'],
                'parent_id' => $params['parent_id'],
                'description' => $params['description'],
                'image' => $uploader->uploadSingleImage($file)
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