<?php

namespace Framework\Container;

use Framework\Bootstrap\LoadConfiguration;
use Framework\Bootstrap\LoadEnvironmentVariables;
use Framework\Bootstrap\RegisterProviders;
use Framework\Support\Config\Config;
use Framework\Support\Config\ConfigInterface;
use League\Container\Argument\Literal\StringArgument;
use League\Container\Container;

class Application extends Container
{
    protected bool $bootstrapped = false;
    protected string $configPath = 'config';
    protected string $routePath = 'routes';
    protected string $environmentFilePath;
    protected string $environmentFile = '.env';

    protected $bootstrappers = [
        LoadEnvironmentVariables::class,
        LoadConfiguration::class,
        RegisterProviders::class,
    ];

    public function __construct(
        protected string $basePath
    ) {
        parent::__construct();

        $this->addShared('basePath', new StringArgument(realpath($this->basePath)));
    }

    public function getBasePath()
    {
        return $this->basePath;
    }

    public function hasBeenBootstrapped(): bool
    {
        return $this->bootstrapped;
    }

    public function bootstrap():void
    {
        $this->bootstrapWith($this->bootstrappers);
    }

    public function bootstrapWith(array $bootstrappers): void
    {
        foreach ($bootstrappers as $bootstrapper) {
            $this->add($bootstrapper);
            $this->get($bootstrapper)->bootstrap($this);
        }
    }

    public function configPath($path = '')
    {
        if (!empty($path)) {
            $this->configPath = $path;
        }

        return $this->basePath . DIRECTORY_SEPARATOR . $this->configPath;
    }

    public function routePath($path = '')
    {
        $config = $this->get(ConfigInterface::class);
        return realpath($config->get('app')['route_dir']);
    }

    public function environmentFile()
    {
        return $this->environmentFile;
    }

    public function environmentFilePath(string $path = '')
    {
        if (!empty($path)) {
            $this->environmentFilePath = $path;
        }

        return $this->getBasePath() . DIRECTORY_SEPARATOR . $this->environmentFile();
    }
}
