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
        if ( $this->request->getMethod() == 'POST' ) {

            $files =  $this->request->getUploadedFiles()['images'] ?? null;

            $uploader->uploadFiles($files, config('path.gallery'), 'image');

            if (!$uploader->hasErrors()) {

                Gallery::saveArray($uploader->getFileNameArray());

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