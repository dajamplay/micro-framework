<?php

namespace App\Models\Product;

use App\Models\Category\Category;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'product';

    protected $fillable = ['id', 'name', 'category_id', 'image', 'size','price', 'price_opt', 'description'];

    public function category()
    {
        return $this->hasOne(Category::class, 'id','category_id');
    }
}