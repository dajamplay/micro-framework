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

    /**
     * @param $files UploadedFile[]
     */
    public function uploadFiles(array | null $files, string $directory, string $type = 'image') : void {

        $this->errors = [];

        $this->files = [];

        if ($files) {

            foreach ($files as $file) {

                $fileName = $file->getClientFilename();

                if ($file->getError() == UPLOAD_ERR_OK && $this->validate($file, $type))  {

                    $file->moveTo($directory . DIRECTORY_SEPARATOR . $fileName);

                    $this->addFile($fileName);

                } else {

                    $this->errors[$fileName][] = "Ошибка загрузки";

                }
            }
        }
    }

    public function uploadFile(UploadedFile | null $file, string $directory,  string $type = 'image') : void
    {
        $this->errors = [];

        $this->files = [];

        if ($file) {

            $fileName = $file->getClientFilename();

            if ($file->getError() == UPLOAD_ERR_OK && $this->validate($file, $type))  {

                $file->moveTo($directory . DIRECTORY_SEPARATOR . $fileName);

                $this->addFile($fileName);

            } else {

                $this->errors[$fileName][] = "Ошибка загрузки";

            }
        }
    }

    public function hasErrors() : bool {
        return count($this->getErrors()) != 0;
    }

    public function getErrors() : array {
        return $this->errors;
    }

    public function getErrorsHTML() : string {
        return $this->arrayErrorsToHTML($this->errors);
    }

    public function getFiles() : array | null {
        return empty($this->files) ? null : $this->files;
    }

    public function getFileName() : string | null {
        return $this->files[0] ?? null;
    }

    private function addFile($fileName) : void {
        $this->files[] = $fileName;
    }

    private function validate(UploadedFile $file, string $type) : bool {

        $fileName = $file->getClientFilename();

        if ($file->getSize() > (int)($this->rules[$type]['size']) * 1024 * 1024) {
            $this->errors[$fileName][] = "Размер файла больше " . $this->rules[$type]['size'] . " мегабайт.";
            return false;
        }

        if ( in_array($file->getClientMediaType(), $this->rules[$type]['types'])  != 1) {
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