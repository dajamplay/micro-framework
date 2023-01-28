<?php

namespace App\Services\FileUploader;

class FileUploader
{
    public function upload($uploadedFiles, string  $fileName, $path = null) : string | null {
        $uploadedImage = $uploadedFiles[$fileName];
        if ($uploadedImage->getError() == UPLOAD_ERR_OK) {
            return $this->moveUploadedFile($path ?? config('path.uploads'), $uploadedImage);
        }
        return null;
    }
    private function moveUploadedFile(string $directory, $uploadedFile): string
    {
        $fileName = $uploadedFile->getClientFilename();
        $uploadedFile->moveTo($directory . DIRECTORY_SEPARATOR . $fileName);
        return $fileName;
    }
}