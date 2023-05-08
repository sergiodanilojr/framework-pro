<?php

use Framework\Container\Application;
use Framework\Facades\FacadeFactory;
use Framework\Http\Kernel;
use Framework\Routing\Router;
use Framework\Routing\RouterInterface;
use Framework\Support\Config\Config;
use League\Container\ReflectionContainer;

require __DIR__ . '/../framework/vendor/autoload.php';

$app = (new Application(
    $_ENV['APP_BASE_PATH'] ?? dirname(__DIR__)
));

$app->defaultToShared();

$app->delegate(new ReflectionContainer(true));

$app->bootstrap();

/*
|--------------------------------------------------------------------------
| Bind Important Interfaces
|--------------------------------------------------------------------------
*/

$app->add(
    RouterInterface::class,
    Router::class
);

$app
    ->add(Kernel::class)
    ->addArgument(RouterInterface::class)
    ->addArgument($app);

$app->get(
    KernelInterface::class,
    Kernel::class
);

FacadeFactory::setContainer($app);

return $app;
