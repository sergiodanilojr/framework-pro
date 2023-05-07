<?php

use Framework\Container\Application;
use Framework\Routing\RouterInterface;
use Framework\Support\Config\Env;
use Framework\Support\Config\EnvInterface;

if (!function_exists('app')) {
    function app()
    {
        //return new Application();

       return require __DIR__ . '/../../bootstrap/app.php';
    }
}

if (!function_exists('route')) {
    function route(string $path)
    {
        $route = app()->get(RouterInterface::class);
    }
}

if(!function_exists('env')){
    function env(string $key)
    {
        return app()->get(EnvInterface::class);
    }
}
