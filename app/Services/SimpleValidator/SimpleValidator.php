<?php

namespace App\Services\SimpleValidator;

use Valitron\Validator;

class SimpleValidator
{
    public Validator $validator;
    public array $rules = [];
    public array $data = [];

    public function validate() : bool {
        return $this->validator->validate();
    }

    public function addData(array $data = []) : void {

    }
}