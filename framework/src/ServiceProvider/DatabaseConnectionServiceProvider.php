<?php

namespace Framework\ServiceProvider;

use Framework\Database\ConnectionFactory;
use Framework\Database\ConnectionFactoryInterface;
use Framework\Facades\Conn;
use Framework\Facades\DB;

class DatabaseConnectionServiceProvider extends ServiceProvider
{
    protected $provides = [
        ConnectionFactoryInterface::class,
        ConnectionFactory::class,
        Conn::class,
    ];

    public function register(): void
    {
        $this->getContainer()->addShared(
            ConnectionFactoryInterface::class,
            ConnectionFactory::class
        );
    }
}
