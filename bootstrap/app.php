<?php

use Framework\Container\Application;
use Framework\Http\Kernel;
use Framework\Http\KernelInterface;
use Framework\Routing\Router;
use Framework\Routing\RouterInterface;
use League\Container\Argument\Literal\ObjectArgument;
use League\Container\ReflectionContainer;
use Psr\Container\ContainerInterface;

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

return $app;
