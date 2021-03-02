<?php

namespace App;

use App\Exception\NotFoundException;
use App\Router\Route;

class Router
{
    private $routers = [];

    public function get($uri, $callback)
    {
        $this->routers[] = new Route('GET', $uri, $callback);
    }

    public function post($uri, $callback)
    {
        $this->routers[] = new Route('POST', $uri, $callback);
    }

    public function dispatch()
    {
        foreach ($this->routers as $route) {
            if ($route->match($_SERVER['REQUEST_METHOD'], $_SERVER['REQUEST_URI'])) {
                return $route->run($_SERVER['REQUEST_URI']);
            }
        }
        throw new NotFoundException();
    }
}