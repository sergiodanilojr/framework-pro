<?php

use Framework\Http\Request;

use Framework\Http\Kernel;

define('BASE_PATH', dirname(__DIR__));

require_once BASE_PATH . '/vendor/autoload.php';

/** @var \League\Container\Container $app */
$app = require BASE_PATH . '/bootstrap/app.php'; 

$request = Request::capture();

$kernel = $app->get(Kernel::class);

$response = $kernel->handle($request);

$response->send();
