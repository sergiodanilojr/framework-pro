<?php

namespace Framework\Http;

use Psr\Container\ContainerInterface;

abstract class Controller
{
    protected $container;

    public function setContainer(ContainerInterface $container): void
    {
        $this->container = $container;
    }

    protected function render(string $template, array $params, ?Response $response = null)
    {
        $content = $this->container->get('twig')->render($template, $params);

        $response  ??= new Response();

        $response->setContent($content);

        return $response;
    }
}
