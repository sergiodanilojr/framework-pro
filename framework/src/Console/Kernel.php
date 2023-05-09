<?php

namespace Framework\Console;

use DirectoryIterator;
use Psr\Container\ContainerInterface;
use ReflectionClass;

class Kernel implements KernelInterface
{
    public function __construct(
        protected ContainerInterface $app
    ) {
    }

    public function handle(): int
    {

        return 0;
    }

    protected function registerCommands(): void
    {
        $commandFiles = new DirectoryIterator(__DIR__ . './Command');

        foreach ($commandFiles as $file) {
            if (!$file->isFile()) {
                continue;
            }
            
            $namespace = "";
        }
    }
}
