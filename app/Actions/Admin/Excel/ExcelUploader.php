<?php

namespace App\Actions\Admin\Excel;

use App\Models\Category\Category;
use App\Models\Product\Product;
use App\Services\Excel\Excel;
use Laminas\Diactoros\UploadedFile;

class ExcelUploader
{
    protected array $productFields = [
        0 => 'sku',
        1 => 'name',
        2 => 'size',
        3 => 'price',
        4 => 'price_opt',
        5 => 'image',
        6 =>'description',
    ];

    protected array $categoryFields = [
        0 => 'name',
        5 => 'image',
        6 => 'description',
    ];

    protected string $excelFormat = "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet";


    private Excel $excel;

    private array $excelArray;

    private string $rootCategoryId;

    private string $categoryId;

    public function __construct(Excel $excel)
    {
        $this->excel = $excel;
    }

    public function upload(UploadedFile | null $file, string | null $rootCategoryId) : bool
    {
        if ($file && $file->getError() == UPLOAD_ERR_OK && $rootCategoryId && $file->getClientMediaType() == $this->excelFormat) {

            $this->prepareData($file, $rootCategoryId);

            $this->deleteCategory($this->rootCategoryId);

            $this->saveAll();

            return true;
        }
        return false;
    }

    private function deleteCategory(string $parentId) : void
    {
        Category::where('parent_id', '=', $parentId)->delete();
    }

    private function saveAll() : void {

        foreach ($this->excelArray as $row) {

            if ($this->isCategory($row)) {

                $this->categoryId = $this->saveCategory($row);

            } else {

                $this->saveProduct($row);

            }
        }
    }

    private function saveCategory(array $row) : string  {

        $fields = array();

        $fields['parent_id'] = $this->rootCategoryId;

        foreach ($this->categoryFields as $key => $value) {
            $fields[$value] = $row[$key];
        }

        $category = Category::create($fields);

        return $category->id;
    }

    private function saveProduct(array $row) : void {

        $fields = array();

        $fields['category_id'] = $this->categoryId;

        foreach ($this->productFields as $key => $value) {
            $fields[$value] = $row[$key];
        }

        $product = Product::create($fields);

        $product->save();
    }

    private function isCategory(array $row) : bool {
        return empty($row[1]);
    }

    private function prepareData(UploadedFile $file, string $rootCategoryId) : void {

        $this->excelArray = $this->excel->xlsxToArray($file);

        unset($this->excelArray[0]);

        $this->rootCategoryId = $rootCategoryId;
    }
}