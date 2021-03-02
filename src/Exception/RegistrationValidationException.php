<?php

namespace App\Exception;

use App\Renderable;

class RegistrationValidationException extends HttpException implements Renderable
{
    public function render()
    {
        view('auth.registration', ['error' => 'Произошла ошибка валидации регистрации!'])->render();
    }
}