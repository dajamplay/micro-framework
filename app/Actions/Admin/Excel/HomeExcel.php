<?php

namespace App\Actions\Admin\Excel;

use App\Actions\Action;
use App\Models\Category\Category;
use App\Services\Excel\Excel;
use App\Services\SimpleValidator\SimpleValidator;
use App\Support\Session\Session;

use Psr\Http\Message\ResponseInterface;

class HomeExcel extends Action
{
    public function __invoke(Excel $excel, SimpleValidator $validator): ResponseInterface
    {
        if ($this->request->getMethod() == 'POST') {

            $excelFormat = "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet";

            $excelFile = $this->request->getUploadedFiles()['excel_file'] ?? null;

            if ($excelFile && $excelFile->getClientMediaType() == $excelFormat && $excelFile->getError() == UPLOAD_ERR_OK) {
                echo '<pre>';
                print_r($excel->xlsxToArray($excelFile)); die;
            } else {
                Session::putFlash('flash_message', 'Невереый файл!', "alert-danger");
            }
        }

        return $this->render('admin.excel.home', [
            'categories' => Category::getRootCategories()
        ]);
    }
}