<?php

namespace App\Models\Gallery;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $table = 'gallery';
    protected $fillable = ['id', 'url', 'name'];

    public static function saveAll(array $images) : void {

        if (!empty($images)) {
            foreach ($images as $imageName) {

                $imageToDb = Gallery::create([
                    'name' => $imageName,
                    'url' => config('site.home_url') . "/gallery/" . $imageName
                ]);

                $imageToDb->save();
            }
        }

    }
}