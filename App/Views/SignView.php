<?php

namespace App\Views;

use Core\View;

class SignView extends View {

  public function getLogin($status = TRUE) {
    $this->getTemplate('authorisation.twig', $status);
  }

}