<?php

namespace App\Actions\Admin\Gallery;

use App\Actions\Action;
use App\Models\Gallery\Gallery;
use App\Services\FileUploader\FileUploader;
use App\Support\Session\Session;
use Psr\Http\Message\ResponseInterface;

class HomeGallery extends Action
{
    public function __invoke(FileUploader $uploader): ResponseInterface
    {
        if ($this->request->getMethod() == 'POST' && $this->request->getUploadedFiles()['images'][0]->getError() == UPLOAD_ERR_OK) {

            $uploader->uploadImages(
                $this->request->getUploadedFiles(),
                config('path.gallery'),
                'images');

            if ($uploader->hasErrors()) {

                Gallery::saveAll($uploader->getFiles());

                Session::putFlash('flash_message', 'Изображения загружены.');

            } else {

                Session::putFlash('flash_message', $uploader->getErrorsHTML(), "alert-danger");

            }
        }

        $images = Gallery::all()->reverse();

        return $this->render('admin.gallery.home', [
            'images' => $images,
            'url' => config('site.home_url') . "/gallery/"
        ]);
    }

}