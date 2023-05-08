<?php

use App\Providers\AppServiceProvider;
use Framework\ServiceProvider\ViewServiceProvider;

return [
    'name' => '',

    'env' => '',

    'route_dir' => __DIR__ . '/../routes',

    'providers' => [
        AppServiceProvider::class,
        ViewServiceProvider::class,
    ],

    'aliases' => [],
];
