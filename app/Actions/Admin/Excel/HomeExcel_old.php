<?php

namespace App\Actions\Admin\Excel;

use App\Actions\Action;
use App\Models\Category\Category;
use App\Models\Product\Product;
use App\Support\Session\Session;
use Psr\Http\Message\ResponseInterface;

class HomeExcel_old extends Action
{
    protected int $rootCategoryId;
    protected int $categoryId;
    protected int $product;

    public function __invoke(): ResponseInterface
    {
        if ($this->request->getMethod() == 'POST') {
            $inputData = [];
            $saveData = [];
            $params = $this->request->getParsedBody();
            $this->rootCategoryId = $params['category_id'];
            $fileTmp = $_FILES['excel_file']['tmp_name'];

            if (($file = fopen($fileTmp, 'r')) !== false) {
                while (($data = fgetcsv($file, config('excel.length'), ';')) !== false) {
                    $inputData[] = $data;
                }
            }

            $this->clearCategory( $this->rootCategoryId);

            for($i = 1; $i < count($inputData); $i++) {
                if (empty($inputData[$i][1])) {
                    $this->categoryId = $this->saveCategory($inputData[$i][0]);
                } else {
                    /**
                     * 1 - name
                     * 2 - size
                     * 3 - price_opt
                     * 4 - price
                     * 5 - Description
                     */
                    $this->saveProduct($inputData[$i][1], $inputData[$i][2], (int)str_replace(' ', '', $inputData[$i][3]), (int)str_replace(' ', '', $inputData[$i][4]), $inputData[$i][5]);
                }
            }
            Session::putFlash('flash_message', 'Файл успешно загружен');
        }

        $categories = Category::all()->where('parent_id', '=', 0);
        return $this->render('admin.excel.home', [ 'categories' => $categories ]);
    }

    protected function saveCategory(String $name, String $description = null): int {
        $category = Category::create([
            'name' => $name,
            'parent_id' => $this->rootCategoryId,
            'description' => $description,
        ]);
        $category->save();
        return $category->id;
    }

    protected function saveProduct(String $name, String $size = null, Int $price_opt = null, $price = null, String $description = null): int {
        $product = Product::create([
            'name' => $name,
            'category_id' => $this->categoryId,
            'description' => $description,
            'price' => $price,
            'price_opt' => $price_opt,
            'size' => str_replace(",",".",$size),
        ]);
        return $product->save();
    }

    protected function clearCategory($parentId) {
        Category::where('parent_id', '=', $parentId)->delete();
    }

    protected function getProductName(Array $array): String {
        return $array[1];
    }
}