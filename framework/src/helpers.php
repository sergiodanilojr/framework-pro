<?php

use Framework\Container\Application;
use Framework\Routing\RouterInterface;

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
    
}
