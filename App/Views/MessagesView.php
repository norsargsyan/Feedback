<?php

namespace App\Views;

use Core\View;

class MessagesView extends View {

  public function getMessages($messageList, $pageInfo = NULL) {
    $this->getTemplate('messages.twig', NULL, NULL, $messageList, $pageInfo);
  }

  public function getOneMessage($messageData) {
    $this->getTemplate('onemessage.twig', NULL, NULL, $messageData);
  }

}