<?php

namespace App\Views;

class MessagesView extends \Core\View
{

    public function getMessages($messageList)
    {
        $this->getTemplate('messages.php', null, null, $messageList);
    }
    public function getOneMessage($messageData)
    {
        $this->getTemplate('onemessage.php', null, null, $messageData);
    }

}