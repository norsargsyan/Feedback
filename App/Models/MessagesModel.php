<?php


namespace App\Models;


class MessagesModel extends \Core\Model
{
    public $messagesList = array();
    public function getMessages()
    {
        $pdo = self::dbConnect();

        $state = $pdo->prepare("SELECT * FROM `message`");
        $state->execute();
        while ($row = $state->fetch())
        {
            array_push($this->messagesList, $row);
        }
    }
    public function getRead($id)
    {

        $pdo = \Core\Model::dbConnect();
        $state = $pdo->prepare("SELECT * FROM `message` WHERE `id` = ? ");
        $state->execute([$id]);
        $data = $state->fetch();
        if(!$data) {
            \Core\Router::get404();
        }
        else {
            return $data;
        }
    }
}