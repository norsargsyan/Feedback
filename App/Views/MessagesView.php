<?php

namespace App\Views;

class MessagesView extends \Core\View
{

    public function getMessages($messageList, $pageInfo = null){
        $this->getTemplate('messages.php', null, null, $messageList, $pageInfo);
    }
    public function getOneMessage($messageData){
        $this->getTemplate('onemessage.php', null, null, $messageData);
    }

}