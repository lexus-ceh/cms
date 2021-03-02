<?php

namespace App\Exception;

use App\Renderable;

class AuthorizationValidationException extends HttpException implements Renderable
{
    public function render()
    {
        view('auth.login', ['error' => 'Неверный логин или пароль!'])->render();
    }
}