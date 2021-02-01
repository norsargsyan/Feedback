<?php

namespace App\Controllers;

use \App\Views\HomeView;

class HomeController extends \Core\Controller
{

    public function index(){
        $homeView = new HomeView;
        $homeView->index();
    }
}