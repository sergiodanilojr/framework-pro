<?php

namespace Framework\Bootstrap;

use Framework\Container\Application;
use Dotenv\Dotenv;
use Framework\Support\Config\Env;
use Framework\Support\Config\EnvInterface;
use Psr\Container\ContainerInterface;

class LoadEnvironmentVariables
{
    public function bootstrap(Application $app)
    {
        $this->populateEnvRepository($app);
    }

    protected function populateEnvRepository(ContainerInterface $app)
    {
        $this->addEnvRepositoryToContainer($app);
        $envs = $this->getEnvironmentVariables($app);

        foreach ($envs as $env => $value) {
            $app->get(EnvInterface::class)->set($env, $value);
        }
    }

    protected function addEnvRepositoryToContainer(ContainerInterface $app)
    {
        $app->addShared(
            EnvInterface::class,
            Env::class
        );
    }

    protected function getEnvironmentVariables(ContainerInterface $app)
    {
        return Dotenv::createImmutable($app->getBasePath())->load();
    }
}
