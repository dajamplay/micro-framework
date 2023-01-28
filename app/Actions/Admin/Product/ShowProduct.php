<?php

namespace App\Actions\Admin\Product;

use App\Actions\Action;
use App\Models\Product\Product;
use Psr\Http\Message\ResponseInterface;

class ShowProduct extends Action
{
    public function __invoke($id): ResponseInterface
    {
        $product = Product::all()->where('id','=', $id)->first();
        return $this->render('admin.product.show', ['product' => $product]);
    }
}