<?php


namespace App\Exception;


class ItemNotFoundException extends HttpException implements \App\Renderable
{

    public function render()
    {
        view('errors.404-basic')->render();
    }
}