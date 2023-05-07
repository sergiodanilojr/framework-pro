<?php

namespace Framework\Routing;

use FastRoute\Dispatcher;
use FastRoute\RouteCollector;
use Framework\Http\HttpException;
use Framework\Http\Request;
use Psr\Container\ContainerInterface;

use function FastRoute\simpleDispatcher;

class Router implements RouterInterface
{
    protected array $routes = [];

    public function dispatch(Request $request, ContainerInterface $container)
    {
        $this->mapRoutes($container);

        [$handler, $vars] = $this->extractInfo($request, $container);

        if (is_array($handler)) {
            [$controllerId, $method] = $handler;
            $controller = $container->get($controllerId);
            $handler = [$controller, $method];
        }

        return [$handler, $vars];
    }

    protected function extractInfo(Request $request): array
    {
        $routeInfo =  $this->dispatcher()->dispatch(
            $request->method(),
            $request->pathInfo()
        );

        list($status) = $routeInfo;

        $info = match ($status) {
            Dispatcher::METHOD_NOT_ALLOWED, Dispatcher::NOT_FOUND => $this->fallback(...$routeInfo),

            default => function () use ($routeInfo) {
                list($status, $handler, $arguments) = $routeInfo;
                return [$handler, $arguments];
            }
        };
 
        return $info();
    }

    protected function fallback($status, ?array $allowedMethods = null)
    {
        $code = 400;
        $message = "Something is Wrong!!!";

        $args = match ($status) {
            Dispatcher::METHOD_NOT_ALLOWED => [
                'code' => 405,
                'message' => "The allowed methods for this path are " . implode(", ", $allowedMethods),
            ],
            Dispatcher::NOT_FOUND => [
                'code' => 404,
                'message' => 'Not found',
            ],
            default => compact($code, $message)
        };

        throw (new HttpException($args['message']))->withStatusCode($args['code']);
    }

    protected function dispatcher()
    {
        return simpleDispatcher(function (RouteCollector $routeCollector) {
            foreach ($this->routes as $route) {
                $routeCollector->addRoute(...$route);
            }
        });
    }

    protected function mapRoutes(ContainerInterface $app)
    {
        $routeDir = $app->routePath();
        $scandir = scandir($routeDir);

        foreach ($scandir as $fileRoute) {

            $fileRoute = $routeDir . DIRECTORY_SEPARATOR . $fileRoute;

            if (is_file($fileRoute)) {
                $routes = require_once $fileRoute;
                $this->routes = array_merge($this->routes, $routes);
            }
        }
    }
}
