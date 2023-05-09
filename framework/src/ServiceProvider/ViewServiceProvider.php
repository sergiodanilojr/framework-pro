<?php

namespace Framework\ServiceProvider;

use Framework\Http\Controller;
use League\Container\Argument\Literal\StringArgument;
use \Twig\Loader\FileSystemLoader;
use \Twig\Environment;

class ViewServiceProvider extends ServiceProvider
{
    protected $templatesPath = "/resources/views";

    protected $provides = [
        'twig',
        'filesystem-loader',
        Controller::class,
    ];

    public function boot(): void
    {
        $this->getContainer()
            ->inflector(Controller::class)
            ->invokeMethod(
                'setContainer',
                [$this->getContainer()]
           );
    }

    public function register(): void
    {
        $this->getContainer()
            ->addShared('filesystem-loader', FileSystemLoader::class)
            ->addArgument(new StringArgument($this->templatePath()));

        $this->getContainer()
            ->addShared('twig', Environment::class)
            ->addArgument('filesystem-loader');
    }

    protected function templatePath(?string $path = null): string
    {
        $basePath = $this->getContainer()->get('basePath');

        if ($path) {
            $this->templatesPath = $path;
        }

        return $basePath . $this->templatesPath;
    }
}
