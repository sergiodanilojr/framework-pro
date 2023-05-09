<?php

namespace Framework\Database;

use Exception;
use Framework\Database\Drivers\Sqlite;
use Framework\Facades\Config;

class ConnectionFactory implements ConnectionFactoryInterface
{
    public const SQLITE = 'pdo_sqlite';
    public const MYSQL = 'pdo_mysql';

    protected $drivers = [
        self::SQLITE => Sqlite::class,
    ];

    public function create(?string $driver = null)
    {
        if (!$driver) {
            $default = Config::get('database')['default'];

            $config = Config::get('database')['connections'][$default];
            $driver = $config['driver'];
        }

        if (!array_key_exists($driver, $this->drivers)) {
            throw new Exception("Driver não encontrado!");
        }

        $connection = call_user_func_array([new $this->drivers[$driver], 'getConnection'], []);
        return $connection;
    }
}
