<?php

namespace App\Controllers;

class HomeController extends \Core\Controller
{

    public function index()
    {
        $homeView = new \App\Views\HomeView;
        $homeView->index();
    }
}