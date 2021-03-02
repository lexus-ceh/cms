<?php

function array_get($array, $key, $default = null)
{
    $keys = explode('.', $key);
    foreach ($keys as $key) {
        $array = $array[$key] ?? $default;
    }
    return $array;
}

final class Config
{
    private $configs = [];

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

    private function __construct()
    {
        $this->configs['db'] = include $_SERVER['DOCUMENT_ROOT'] . '/configs/db.php';
    }
    private function __clone() {}
    private function __wakeup() {}

}

var_dump(Config::getInstance()->getConfig('db.driver'));