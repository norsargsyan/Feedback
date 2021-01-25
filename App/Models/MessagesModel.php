<?php


namespace App\Models;


class MessagesModel extends \Core\Model
{
    public $messagesList = array();
    public static $emptyList;
    public function getMessages()
    {
        $pdo = self::dbConnect();

        $state = $pdo->prepare("SELECT * FROM `message` ORDER BY `DATE` DESC");
        $state->execute();

        while ($row = $state->fetch())
        {
            array_push($this->messagesList, $row);
        }
        if($state->rowCount() == 0)
        {
            self::$emptyList = true;
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
            $state = $pdo->prepare("UPDATE `message` SET `STATUS` = 1 WHERE `id` = ? ");
            $state->execute([$id]);

            return $data;
        }
    }
    public function getDelete($id)
    {
        $pdo = \Core\Model::dbConnect();
        $state = $pdo->prepare("DELETE FROM `message` WHERE `id` = ? ");
        $deleteStatus = $state->execute([$id]);
        echo $deleteStatus;
    }
    public function getReadedToggle($id)
    {
        $pdo = \Core\Model::dbConnect();
        $state = $pdo->prepare("SELECT `status` FROM `message` WHERE `id` = ? ");
        $state->execute([$id]);
        $status = $state->fetchColumn();
        if($status == 0) $status = 1;
        else $status = 0;
        $state = $pdo->prepare("UPDATE `message` SET `STATUS` = ? WHERE `id` = ? ");
        $readedStatus = $state->execute([$status, $id]);
        echo $status;

    }
}