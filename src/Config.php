<?php

namespace App;

final class Config
{
    private $configs = [];

    private function __construct()
    {
        $this->configs['db'] = include $_SERVER['DOCUMENT_ROOT'] . '/configs/db.php';
    }

    public function getConfig($key, $default = null)
    {
        return array_get($this->configs, $key, $default);
    }

    public function setConfig($key, $config)
    {
        $this->configs[$key] = $config;
        return $this;
    }

    /** @var Config */
    private static $instance;

    public static function getInstance(): Config
    {
        if (null === static::$instance) {
            static::$instance = new static();
        }
        return static::$instance;
    }

    private function __clone() {}
    private function __wakeup() {}

}
