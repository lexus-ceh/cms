<?php


namespace App\Factory;


class PaginatorFactory
{
    public function make($view, $data)
    {
        view($view, $data)->render();
    }
}