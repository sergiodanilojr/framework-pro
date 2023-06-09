<?php

namespace App\Http\Controllers;

use Framework\Facades\Conn;
use Framework\Http\Controller;
use Framework\Http\Response;

class HomeController extends Controller
{
    public function index(): Response
    {
        return $this->render('website/home.html.twig', [
            'name' => 'Bagual',
        ]);
    }
}
