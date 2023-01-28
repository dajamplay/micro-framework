<?php

namespace App\Models\Category;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    protected $table = 'category';
    protected $fillable = ['id', 'name', 'parent_id', 'description', 'image'];

    public function parent()
    {
        return $this->hasOne(Category::class, 'id','parent_id');
    }


}