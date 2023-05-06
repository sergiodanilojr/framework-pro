<?php

namespace Framework\Routing;

final class RouterCollector
{
    public static $instance;

    protected array $routes = [];


    public function routes()
    {
        return $this->routes;
    }

    public function addRoute(string $method, $path, $handler): void
    {
        $route = new Route(method: $method, path: $path, handler: $handler);
        $this->routes[$path] = array_values($route->toArray());
    }

    public function get($path, $handler)
    {
        $this->addRoute('GET', $path, $handler);
    }

    public function post($path, $handler)
    {
        $this->addRoute('POST', $path, $handler);
    }

    public function put($path, $handler)
    {
        $this->addRoute('PUT', $path, $handler);
    }

    public function patch($path, $handler)
    {
        $this->addRoute('PATCH', $path, $handler);
    }

    public function delete($path, $handler)
    {
        $this->addRoute('DELETE', $path, $handler);
    }
}
