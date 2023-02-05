<?php

namespace App\Services\FileUploader;

use Laminas\Diactoros\UploadedFile;

class FileUploader
{
    private array $errors;

    private array $files;

    private array $rules = [
        'image' => [
            'size' => 10,
            'types' => ['image/jpg', 'image/png', 'image/jpeg']
        ]
    ];

    public function uploadImages(array $files, string $path = null, string $inputName = "files") : void {

        $this->errors = [];

        $files = $files[$inputName];

        $directory = $path ?? config('path.uploads');

        foreach ($files as $file) {

            $fileName = $file->getClientFilename();

            if ($file->getError() == UPLOAD_ERR_OK && $this->imageValidate($file))  {

                $file->moveTo($directory . DIRECTORY_SEPARATOR . $fileName);

                $this->addFile($fileName);

            } else {

                $this->errors[$fileName][] = "Ошибка загрузки";

            }
        }
    }

    public function uploadSingleImage(UploadedFile | null $file, string $path = null) : string | false
    {
        $this->errors = [];

        if ($file && $file->getError() == UPLOAD_ERR_OK && $this->imageValidate($file))  {

            $directory = $path ?? config('path.uploads');

            $fileName = $file->getClientFilename();

            $file->moveTo($directory . DIRECTORY_SEPARATOR . $fileName);

            return $fileName;

        } else {

            $this->errors[$file->getClientFilename()][] = "Ошибка загрузки";

        }

        return false;
    }

    public function hasErrors() : bool {
        return count($this->getErrors()) == 0;
    }

    public function getErrors() : array {
        return $this->errors;
    }

    public function getErrorsHTML() : string {
        return $this->arrayErrorsToHTML($this->errors);
    }

    public function getFiles() : array {
        return $this->files;
    }

    private function addFile($fileName) : void {
        $this->files[] = $fileName;
    }

    private function imageValidate($file) : bool {

        $fileName = $file->getClientFilename();
        if ($file->getSize() > (int)($this->rules['image']['size']) * 1024 * 1024) {
            $this->errors[$fileName][] = "Размер файла больше " . $this->rules['image']['size'] . " мегабайт.";
            return false;
        }
        if ( in_array($file->getClientMediaType(), $this->rules['image']['types'])  != 1) {
            $this->errors[$fileName][] = "Неверный формат изображения. " . $file->getClientMediaType();
            return false;

        }

        return true;
    }

    private function arrayErrorsToHTML($uploaderErrors) : string {
        if (count($uploaderErrors) > 0) {
            $message = '<ul>';
            foreach ($uploaderErrors as $imageName => $errors) {
                $message .= "<li><b>{$imageName}</b><ul>";
                foreach ($errors as $error) {
                    $message .= "<li>{$error}</li>";
                }
                $message .= '</li></ul>';
            }
            $message .= '</ul>';
            return $message;
        }
        return "Ошибка.";
    }
}