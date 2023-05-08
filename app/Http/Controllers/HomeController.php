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
    public function __construct()
    {
    }

    public function index(): Response
    {
        return $this->render('website/home.html.twig', [
            'name' => 'Bagual',
        ]);
    }
}
