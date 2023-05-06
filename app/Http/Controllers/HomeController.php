<?php

namespace App\Http\Controllers;

use Framework\Http\Response;
use Framework\Support\Config\Config;
use Psr\Container\ContainerInterface;

class HomeController
{
    public function __construct(
        protected Config $config,
    )
    {
        
    }

    public function index():Response
    {
        $content = "<h1>Simbora Dev!</h1>";

        dd( $this->config);

        return new Response($content);
    }
}