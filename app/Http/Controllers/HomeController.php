<?php

namespace App\Http\Controllers;

use Framework\Http\Controller;
use Framework\Http\Response;
use Framework\Routing\RouterInterface;
use Framework\Support\Config\Config;
use Framework\Support\Config\ConfigInterface;
use Framework\Support\Config\EnvInterface;

class HomeController extends Controller
{
    public function __construct(
        protected ConfigInterface $config,
        protected EnvInterface $env,
        protected RouterInterface $router,
    )
    {
        
    }

    public function index():Response
    {
        $content = "<h1>Simbora Dev!</h1>";
        $env = $this->env->get('APP_USER');
        
        return new Response($content);
    }
}