<?php

namespace App\Models\Category;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class Category extends Model
{
    protected $table = 'category';

    protected $fillable = ['id', 'name', 'parent_id', 'description', 'image'];

    public function parent()
    {
        return $this->hasOne(Category::class, 'id','parent_id');
    }

    public static function getRootCategories() : Collection | null {
        return self::all()->where('parent_id', '=', 0) ?? null;
    }
}