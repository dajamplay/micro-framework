<?php

namespace App\Actions\Admin\Excel;

use App\Actions\Action;
use App\Models\Category\Category;
use App\Support\Session\Session;

use Psr\Http\Message\ResponseInterface;

class HomeExcel extends Action
{
    public function __invoke(ExcelUploader $uploader): ResponseInterface
    {
        if ($this->request->getMethod() == 'POST') {

            $excelFile = $this->request->getUploadedFiles()['excel_file'] ?? null;

            $rootCategoryId = $this->request->getParsedBody()['category_id'] ?? null;

            if ($uploader->upload($excelFile, $rootCategoryId)) {

                Session::putFlash('flash_message', 'Файл загружен!');

            } else {

                Session::putFlash('flash_message', 'Ошибка', "alert-danger");

            }
        }

        return $this->render('admin.excel.home', [
            'categories' => Category::getRootCategories()
        ]);
    }
}