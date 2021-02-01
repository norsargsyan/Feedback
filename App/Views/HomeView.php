<?php


namespace App\Views;


use Core\View;

class HomeView extends View {

  public function index() {
    $this->getTemplate('feedback.twig');
  }

}