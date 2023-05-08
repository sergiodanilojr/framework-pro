<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\MeController;
use Framework\Http\Response;
use Framework\Routing\RouterCollector;

$router = new RouterCollector;

$router->addRoute('GET','/', [HomeController::class,'index']);

// $router->get('/me', function(){
//     return  new Response("My name is Sérgio Danilo.");
// });

$router->get('/me', [MeController::class, 'index']);

return $router->routes();