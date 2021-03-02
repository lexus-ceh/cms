<?php

namespace App\View;

use App\Renderable;

class View implements Renderable
{
    private $page;
    private $parameters;

    public function __construct($page, $parameters)
    {
        $this->page = $page;
        $this->parameters = $parameters;
    }

    public function render()
    {
        $file = str_replace('.', DIRECTORY_SEPARATOR, $this->page) . '.php';
        $data = $this->parameters;
        include VIEW_DIR . $file;
    }
}