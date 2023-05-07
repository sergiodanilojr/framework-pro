<?php

namespace Framework\Http;

use Framework\Bootstrap\LoadConfiguration;
use Framework\Bootstrap\LoadEnvironmentVariables;
use Framework\Bootstrap\RegisterProviders;
use Framework\Routing\RouterInterface;
use Framework\Support\Config\Config;
use Psr\Container\ContainerInterface;


class Kernel
{
    protected $bootstrappers = [
        LoadEnvironmentVariables::class,
        LoadConfiguration::class,
        RegisterProviders::class,
    ];

    public function __construct(
        protected RouterInterface $router,
        protected ContainerInterface $container
    ) {
        $this->bootstrapContainer();
    }

    public function handle(Request $request): Response
    {
        // dd($this->container);
        try {
            [$routeHandler, $vars] = $this->router->dispatch($request, $this->container);

            $response = call_user_func_array($routeHandler, $vars);
        } catch (HttpException $exception) {
            $response = new Response($exception->getMessage(), $exception->statusCode());
        }

        return $response;
    }

    private function bootstrapContainer()
    {
        if (!$this->container->hasBeenBootstrapped()) {
            $this->container->bootstrapWith($this->bootstrappers);
        }
    }
}
