<?php

namespace Framework\ServiceProvider;

use League\Container\ServiceProvider\BootableServiceProviderInterface;

interface ServiceProviderInterface
{
    public function provides(string $id): bool;
    public function register(): void;
}
