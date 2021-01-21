<?php


namespace App\Controllers;


class ValidateController extends \Core\Validate
{

    public function index()
    {
        if (isset($_POST['message_send'])) {
            $messageData = $this->checkMessage();
            if($messageData)
            {
                $insert = new \App\Models\InsertModel;
                $insert->insertMessage($messageData);
            }
            else{
//                VALIDACIYAN CHANCNELU DEPQ
            }
        }
    }

}