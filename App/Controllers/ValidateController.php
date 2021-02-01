<?php


namespace App\Controllers;


use App\Models\InsertModel;
use Core\Router;
use Core\Validate;
use Core\View;

class ValidateController extends Validate {

  public function index() {
    if (isset($_POST['message_send'])) {
      $messageData = $this->checkMessage();
      $sendStatus = FALSE;
      if ($messageData[0]) {
        $insert = new InsertModel;
        $sendStatus = $insert->insertMessage($messageData);
      }
      $homeView = new View;
      $homeView->getTemplate('feedback.twig', $sendStatus, $messageData);
    }
    else {
      Router::get404();
    }
  }

}