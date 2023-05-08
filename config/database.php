<?php

return [
    'default' => env('DB_CONNECTION', 'mysql'),

    'connections' => [
        'sqlite' => [
            'driver' => 'pdo_sqlite',
            'url' => env('DATABASE_URL', realpath(__DIR__ . '/../database/db.sqlite')),
            'database' => env('DB_DATABASE'),

        ],
        'mysql' => [
            'driver' => 'pdo_mysql',
            'user' => env('DB_USER', 'forge'),
            'password' => env('DB_PASSWORD', 'password'),
            'host' => env('DB_HOST', '127.0.0.1'),
            'port' => env('DB_PORT', '3306'),
            'database' => env('DB_DATABASE', 'forge'),
            'unix_socket' => env('DB_SOCKET', ''),
            'charset' => 'utf8mb4',
            'options'=>[],
        ],
    ],

    'migrations' => 'migrations',

    'paths' => [
        'seeders' => __DIR__ . '/database/seeders',
        'migrations' => __DIR__ . '/database/migrations',
    ],

];
