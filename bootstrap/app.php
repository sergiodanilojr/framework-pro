<?php

use Framework\Container\Application;
use Framework\Http\Kernel;
use Framework\Routing\Router;
use Framework\Routing\RouterInterface;
use League\Container\Argument\Literal\ObjectArgument;
use League\Container\ReflectionContainer;

require __DIR__ . '/../framework/vendor/autoload.php';

$app = new Application(
    $_ENV['APP_BASE_PATH'] ?? dirname(__DIR__)
);

$app->delegate(new ReflectionContainer(true));

/*
|--------------------------------------------------------------------------
| Bind Important Interfaces
|--------------------------------------------------------------------------
*/

$app->add(
    RouterInterface::class,
    Router::class
);

$app->add(Kernel::class)
    ->addArgument(RouterInterface::class)
    ->addArgument($app);

return $app;
