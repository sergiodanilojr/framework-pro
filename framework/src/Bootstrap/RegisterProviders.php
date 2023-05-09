<?php

namespace Framework\Bootstrap;

use Exception;
use Framework\Container\Application;
use Framework\Support\Config\ConfigInterface;
use Framework\Support\Config\EnvInterface;
use League\Container\Argument\Literal\StringArgument;
use Psr\Container\ContainerInterface;

class RegisterProviders
{
    protected array $providers = [];

    public function bootstrap(ContainerInterface $app)
    {
        $this->registerProvidersFromConfig($app);
    }

    protected function registerProvidersFromConfig(ContainerInterface $app)
    {
        $config = $app->get(ConfigInterface::class);
        $appConfig = $config->get('app');

        $this->providers = $appConfig['providers'] ?? [];

        foreach ($this->providers as $providerClass) {
            $app->addServiceProvider(new $providerClass);
        }
    }
}
