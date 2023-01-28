<?php

namespace App\Actions\Public\Product;

use App\Actions\Action;
use App\Models\Category\Category;
use App\Models\Product\Product;
use App\Support\Session\Session;
use Psr\Http\Message\ResponseInterface;

class ShowProduct extends Action
{
    public function __invoke($id): ResponseInterface
    {
        if ($this->request->getMethod() == 'POST') {
            $params = $this->request->getParsedBody();
            $productName = $params['productName'];
            $clientTel = $params['tel'];
            $clientEmail = $params['email'];
            $clientText = $params['text'];
            $message = "$clientEmail\r\n$clientTel\r\n$clientText\r\n$productName";
            $message = wordwrap($message, 140, "\r\n");
            if (mail('ggyoug@gmail.com', 'Новая заявка', $message)) {
                if(mail($clientEmail, 'Елеанта | Профессиональная косметика', "Спасибо за заявку! Заявка поступила в обработку.")) {
                    Session::putFlash('flash_message', "Заявка оформлена!");
                }
            } else {
                Session::putFlash('flash_message', "Ошибка!");
            }
        }

        $product = Product::find($id);

        $category = Category::find($product->category_id);

        $categoriesMenu = Category::all()->where('parent_id', '=', 0);

        $products = Product::all()->where('category_id', '=', $product->category_id);

        return $this->render('public.product.show', [
            'category' => $category,
            'categoriesMenu' => $categoriesMenu,
            'product' => $product,
            'products' => $products,
            'title' => $product->name
        ]);
    }
}