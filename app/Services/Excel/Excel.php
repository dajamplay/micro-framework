<?php

namespace App\Services\Excel;

use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

class Excel
{
    private Xlsx $reader;

    public function __construct($reader)
    {
        $this->reader = $reader;
    }

    public function xlsxToArray($excelFile) : array {

        $spreadsheet = $this->reader->load($excelFile->getStream()->getMetadata('uri'));

        return $spreadsheet->getActiveSheet()->toArray();

    }
}