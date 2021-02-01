<?php


namespace App\Views;


use Core\View;

class ErrorView extends View {

  public function index() {
    $this->getTemplate('error-page.twig');
  }

}