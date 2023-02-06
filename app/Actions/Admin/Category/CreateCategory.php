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

            $params = $this->request->getParsedBody();

            $file = $this->request->getUploadedFiles()['image'] ?? null;

            $uploader->uploadFile($file, config('path.uploads'), 'image');

            if (!$uploader->hasErrors()) {

                $category = Category::create([
                    'name' => $params['name'],
                    'parent_id' => $params['parent_id'],
                    'description' => $params['description'],
                    'image' => $uploader->getFileName()
                ]);

                $category->save();

                Session::putFlash('flash_message', 'Категория создана');

            } else {

                Session::putFlash('flash_message', $uploader->getErrorsHTML(), 'alert-danger');

            }
        }

        return $this->render('admin.category.create', [
            'rootCategories' => Category::getRootCategories()
        ]);
    }
}