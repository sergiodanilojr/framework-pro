<?php

namespace Framework\Http;

use Psr\Container\ContainerInterface;

interface KernelInterface
{
    public function handle(Request $request):ResponseInterface;
}