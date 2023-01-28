<?php

namespace App\Actions\Admin\Auth;

use App\Actions\Action;

use App\Support\Session\Session;
use Psr\Http\Message\ResponseInterface;

class Login extends Action
{
    public function __invoke(): ResponseInterface
    {
        if($this->request->getMethod() == 'POST') {
            if( ($_POST['uname'] == 'e!87_33') && ($_POST['psw'] == 'el!10_9!') ) {
                Session::put('auth', 'admin');
                return $this->redirect('/admin/home');
            }
            Session::putFlash('password_incorrect', 'Неверный логин или пароль');
        }

        if (Session::has('auth')) {
            return $this->redirect('/admin/home');
        }

        return $this->render('admin.auth.login');
    }
}