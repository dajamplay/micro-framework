<?php

namespace App\Models\Gallery;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $table = 'gallery';
    protected $fillable = ['id', 'url', 'name'];
}