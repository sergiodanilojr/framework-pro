<?php

namespace Framework\ServiceProvider;

use League\Container\ServiceProvider\AbstractServiceProvider;

use League\Container\ServiceProvider\BootableServiceProviderInterface;

class ServiceProvider extends AbstractServiceProvider implements ServiceProviderInterface, BootableServiceProviderInterface
{
    protected $provides = [];   

    public function boot(): void
    {
    }

    public function provides(string $id): bool
    {
        if(!in_array($id, $this->provides)){
            $this->provides[] = $id;
            $this->getContainer()->add($id);
        }

        return (in_array($id, $this->provides));
    }

    public function register(): void
    {
       
    }

}
