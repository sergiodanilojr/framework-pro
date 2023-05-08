<?php

use Framework\Routing\RouterInterface;

if (!function_exists('app')) {
    function app()
    {
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
        if(!array_key_exists($key, $_ENV)){
            return null;
        }

        return $_ENV[$key];
    }
}
