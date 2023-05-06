<?php

namespace Framework\Container;

use League\Container\Argument\Literal\ObjectArgument;
use League\Container\Container;

class Application extends Container
{
    protected bool $bootstrapped = false;
    protected string $configPath = 'config';

    public function __construct(
        protected string $basePath
    ) {
        parent::__construct();
    }

    public function getBasePath()
    {
        return $this->basePath;
    }

    public function hasBeenBootstrapped(): bool
    {
        return $this->bootstrapped;
    }

    public function bootstrapWith(array $bootstrappers): void
    {
        foreach ($bootstrappers as $bootstrapper) {
            $this->add($bootstrapper);
            $this->get($bootstrapper)->bootstrap($this);
        }

        $this->bootstrapped = true;
    }

    public function configPath($path = '')
    {
        if (!empty($path)) {
            $this->configPath = $path;
        }

        return $this->basePath . '/' . $this->configPath;
    }
}
