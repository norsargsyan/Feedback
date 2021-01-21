<?php


namespace App\Controllers;


use App\Views\HomeView;

class ValidateController extends \Core\Validate
{

    public function index()
    {
        if (isset($_POST['message_send'])) {
            $messageData = $this->checkMessage();
            $sendStatus = false;
            if($messageData[0])
            {
                $insert = new \App\Models\InsertModel;
                $sendStatus = $insert->insertMessage($messageData);
            }
            $homeView = new \Core\View;
            $homeView->getTemplate('feedback.php', $sendStatus,  $messageData);
        }
        else{
            \Core\Router::get404();
        }
    }
}