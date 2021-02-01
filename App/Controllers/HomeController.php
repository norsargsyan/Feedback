<?php

namespace App\Controllers;

use App\Views\HomeView;
use Core\Controller;

class HomeController extends Controller {

  public function index() {
    $homeView = new HomeView;
    $homeView->index();
  }

}