<?php

namespace App\Actions\Admin\Product;

use App\Actions\Action;
use App\Models\Product\Product;
use Psr\Http\Message\ResponseInterface;

class DeleteProduct extends Action
{
    public function __invoke($id): ResponseInterface
    {
        if ($product = Product::find($id)) {
            $product->delete();
        }

        return $this->render('admin.product.delete', [
            'product' => $product,
        ]);
    }
}