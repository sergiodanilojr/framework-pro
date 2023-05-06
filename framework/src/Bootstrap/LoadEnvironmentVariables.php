<?php

namespace Framework\Bootstrap;

use Framework\Container\Application;
use Dotenv\Dotenv;

class LoadEnvironmentVariables
{
    public function bootstrap(Application $application)
    {
        $dotenv = Dotenv::createImmutable($application->getBasePath());
        $dotenv->safeLoad();
    }
}
