<?php

namespace Framework\Database\Drivers;

use Doctrine\DBAL\Connection;
use Doctrine\DBAL\DriverManager;
use Framework\Database\ConnectionFactory;
use Framework\Database\ConnectionInterface;
use Framework\Facades\Config;
use Exception;

class Sqlite implements ConnectionInterface
{
    public function getConnection(): Connection
    {
        return DriverManager::getConnection(['url' => $this->resolveURL()]);
    }

    protected function resolveURL(): string
    {
        if (empty($configs = $this->getConfigs())) {
            throw new Exception("Whooopsss... This connection driver not resolved.");
        }

        return $this->parseURL($configs);
    }

    protected function parseURL(array $config): string
    {
        return "sqlite:///{$config['url']}";
    }

    protected function getConfigs(): ?array
    {
        $connections = Config::get('database')['connections'];

        return array_pop(
            array_filter(
                $connections,
                function ($config) {
                    if ($config['driver'] === ConnectionFactory::SQLITE) {
                        return $config;
                    }
                }
            )
        ) ?? null;
    }
}
