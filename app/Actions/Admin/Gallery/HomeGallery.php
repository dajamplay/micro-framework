<?php

namespace App\Actions\Admin\Gallery;

use App\Actions\Action;
use App\Models\Gallery\Gallery;
use App\Services\FileUploader\FileUploader;
use App\Support\Session\Session;
use Psr\Http\Message\ResponseInterface;

class HomeGallery extends Action
{
    public function __invoke(FileUploader $fileUploader): ResponseInterface
    {
        if ($this->request->getMethod() == 'POST') {

            $imageName = $fileUploader->upload($this->request->getUploadedFiles(), 'image', config('path.gallery'));

            if ($imageName) {

                $image = Gallery::create([
                    'name' => $imageName,
                ]);

                if ($image->save()) {
                    Session::putFlash('flash_message', 'Изображение "' . $imageName . '" загружено.');
                } else {
                    Session::putFlash('flash_message', 'ОШИБКА');
                }
            }

        }

        $images = Gallery::all()->reverse();

        return $this->render('admin.gallery.home', [
            'images' => $images,
            'url' => config('site.gallery_url')
        ]);
    }
}