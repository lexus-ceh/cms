<?php

namespace App;
use Exception;
use Illuminate\Database\Capsule\Manager as Capsule;

class Application
{
    private $router;

    public function __construct(Router $router)
    {
        $this->router = $router;
        $this->initialize();
    }

    public function initialize()
    {
        $capsule = new Capsule;

        $capsule->addConnection([
            'driver'    => Config::getInstance()->getConfig('db.driver'), // 'mysql'
            'host'      => Config::getInstance()->getConfig('db.host'), // 'localhost'
            'database'  => Config::getInstance()->getConfig('db.dbname'), // 'cms'
            'username'  => Config::getInstance()->getConfig('db.username'), // 'mysql'
            'password'  => Config::getInstance()->getConfig('db.password'), // 'mysql'
            'charset'   => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix'    => '',
        ]);

        $capsule->setAsGlobal();

        $capsule->bootEloquent();

    }

    public function run()
    {
        try {
            $dispatch = $this->router->dispatch();
            if ($dispatch instanceof Renderable) {
                $dispatch->render();
            } else {
                echo $dispatch;
            }
        } catch (Exception $e) {
            $this->renderException($e);
        }
    }

    public function renderException(Exception $exception)
    {
        if ($exception instanceof Renderable) {
            $exception->render();
        } else {
            echo 'Код ошибки: ' . $exception->getCode() !== 0 ?: '500';
            echo $exception->getMessage();
        }
    }
}