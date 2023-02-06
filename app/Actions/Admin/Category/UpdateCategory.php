<?php


namespace App\Actions\Admin\Category;

use App\Actions\Action;
use App\Models\Category\Category;
use App\Services\FileUploader\FileUploader;
use App\Support\Session\Session;
use Psr\Http\Message\ResponseInterface;

class UpdateCategory extends Action
{
    public function __invoke($id, FileUploader $uploader): ResponseInterface
    {
        if ($this->request->getMethod() == 'POST') {

            $file = $this->request->getUploadedFiles()['image'] ?? null;

            $uploader->uploadFile($file, config('path.uploads'), 'image');

            $params = $this->request->getParsedBody();

            $category = Category::find($params['id']);

            $category->name = $params['name'];
            $category->parent_id = $params['parent_id'];
            $category->description = $params['description'];
            $category->image = $uploader->getFileName() ?? $category->image;

            if ($category->save()) {
                Session::putFlash('flash_message', 'Категория обновлена');
            }
        }

        $category = Category::find($id);
        $rootCategories = Category::all()->where('parent_id','=', null);

        return $this->render('admin.category.update', [
            'category' => $category,
            'rootCategories' => $rootCategories
        ]);
    }
}