<?php

namespace App\Actions\Admin\Auth;

use App\Support\Session\Session;
use App\Actions\Action;
use Psr\Http\Message\ResponseInterface;

class Out extends Action
{
    public function __invoke(): ResponseInterface
    {
        Session::delete('auth');
        return $this->redirect('/admin-login');
    }
}
