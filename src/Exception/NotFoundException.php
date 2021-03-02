<?php

namespace App\Exception;

use App\Renderable;

class NotFoundException extends HttpException implements Renderable
{
    public function render()
    {
        view('errors.404')->render();
    }
}
