<?php

namespace Framework\Console;

use Framework\Http\Request;
use Framework\Http\ResponseInterface;
use Psr\Container\ContainerInterface;

interface KernelInterface
{
    public function handle(): int;
}
