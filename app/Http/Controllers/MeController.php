<?php

namespace App\Http\Controllers;

use Framework\Http\Controller;
use Framework\Http\Response;

class MeController extends Controller
{
    public function index(): Response
    {
        return $this->render('website/home.html.twig', [
            'name' => 'LOCALHOST',
        ]);
    }
}
