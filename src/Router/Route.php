<?php

namespace App\Router;

class Route
{
    private $method;
    private $path;
    private $callback;

    public function __construct($method, $path, $callback)
    {
        $this->method = $method;
        $this->path = $this->preparePath($path);
        $this->callback = $this->prepareCallback($callback);
    }

    private function preparePath($path)
    {
        if (substr($path, 0, 1) != '/' && $path != '/') {
            $path = '/' . $path;
        }

        if (substr($path, strlen($path) - 1, 1) == '/' && $path != '/') {
            $path = substr($path, 0, strlen($path) - 1);
        }

        return $path;
    }

    private function prepareCallback($callback)
    {
        if (is_string($callback) && strpos($callback, '@') !== false) {
            $callback = explode('@', $callback);
            $obj = new $callback[0]();
            $callback = array($obj, $callback[1]);
        }
        return $callback;
    }

    public function getPath()
    {
        return $this->path;
    }

    public function match($method, $uri): bool
    {
        return $method == $this->method && preg_match( '/^' . str_replace([ '*' , '/' ], [ '\w+' , '\/' ], $this ->getPath()) .
                '(\?.+)?' . '$/' , $uri);
    }

    public function run($uri)
    {
        $url_parts = explode('/', $uri);
        $route_parts = explode('/', $this->getPath());
        $params = [];
        foreach ($route_parts as $key => $part) {
            if ($part === '*') {
                $params[] = $url_parts[$key];
            }
        }

        if (!empty($_POST)) {
            foreach ($_POST as $key => $value)
                $params[$key] = $value;
        }

        return call_user_func_array($this->callback, $params);
    }

}