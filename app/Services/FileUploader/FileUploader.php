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

//    private FileValidator $validator;
//
//    public function __construct(FileValidator $validator)
//    {
//        $this->validator = $validator;
//    }

    /**
     * @param $files UploadedFile[]
     */
    public function uploadFiles(array | null $files, string $directory, string $type = 'image') : void {

        $this->clearData();

        if ($files[0]->getError() == UPLOAD_ERR_OK) {

            foreach ($files as $file) {

                $this->upload($file, $directory, $type);

            }

        }
    }

    public function uploadFile(UploadedFile | null $file, string $directory,  string $type = 'image') : void
    {

        $this->clearData();

        if ($file->getError() == UPLOAD_ERR_OK) {

            $this->upload($file, $directory, $type);

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

    public function getSuccessUploadedFilesHTML() : string {
        return $this->arraySuccessUploadedFilesToHTML($this->files);
    }

    public function getFileNameArray() : array | null {
        return empty($this->files) ? null : $this->files;
    }

    public function getFileName() : string | null {
        return $this->files[0] ?? null;
    }

    public function hasUploadedImage() : bool {
        return count($this->files) > 0;
    }

    private function upload(UploadedFile | null $file, string $directory, string $type) {

        $fileName = $file->getClientFilename();

        if ($file->getError() == UPLOAD_ERR_OK && $this->validate($file, $type))  {

            $this->createDirectoryIfNotExists($directory);

            $file->moveTo($directory . DIRECTORY_SEPARATOR . $fileName);

            $this->addUploadedFile($fileName);

        } else {

            $this->errors[$fileName][] = "Ошибка загрузки";

        }
    }

    private function clearData() {

        $this->errors = [];

        $this->files = [];

    }

    private function addUploadedFile($fileName) : void {
        $this->files[] = $fileName;
    }

    private function validate(UploadedFile $file, string $type) : bool {

        $fileName = $file->getClientFilename();

        if ($file->getSize() > (int)($this->rules[$type]['size']) * 1024 * 1024) {
            $this->errors[$fileName][] = "Размер файла больше " . $this->rules[$type]['size'] . " мегабайт.";
            return false;
        }

        if ( in_array($file->getClientMediaType(), $this->rules[$type]['types'])  != 1) {
            $this->errors[$fileName][] = "Неверный формат изображения. ";
            return false;
        }

        return true;
    }

    private function arrayErrorsToHTML($uploaderErrors) : string {
        if (count($uploaderErrors) > 0) {
            $message = '<ul>';
            foreach ($uploaderErrors as $imageName => $errors) {
                $message .= "<li>{$imageName}<ul>";
                foreach ($errors as $error) {
                    $message .= "<li>{$error}</li>";
                }
                $message .= '</li></ul>';
            }
            $message .= '</ul>';
            return $message;
        }
        return "";
    }

    private function arraySuccessUploadedFilesToHTML(array $successUploadedFiles) : string {
        if (count($successUploadedFiles) > 0) {
            $message = '<ul>';
            foreach ($successUploadedFiles as $file) {
                $message .= "<li><b>{$file}</b> загружен.<ul>";
            }
            $message .= '</ul>';
            return $message;
        }
        return "";
    }

    private function createDirectoryIfNotExists(string $directory) {
        if (!file_exists($directory)) {
            mkdir($directory, 0777, true);
        }
    }
}