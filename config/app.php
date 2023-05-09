<?php

use App\Providers\AppServiceProvider;
use Framework\ServiceProvider\ConsoleServiceProvider;
use Framework\ServiceProvider\DatabaseConnectionServiceProvider;
use Framework\ServiceProvider\ViewServiceProvider;

return [
    'name' => env('APP_ENV'),

    'env' => env('APP_ENVIRONTMENT'),

    'route_dir' => realpath(__DIR__ . '/../routes'),

    'providers' => [
        AppServiceProvider::class,
        ViewServiceProvider::class,
        DatabaseConnectionServiceProvider::class,
        ConsoleServiceProvider::class,
    ],

    'aliases' => [],
];
