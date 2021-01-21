<?php

namespace App\Models;

class InsertModel extends \Core\Model
{
    public function insertMessage($messageData)
    {
        $pdo = \Core\Model::dbConnect();
        try {
            $state = $pdo->prepare("INSERT INTO `message` (`name`, `last_name`, `email`, `message`, `date`, `ip`)
                    VALUES(?, ?, ?, ?, ?, ?)");
            var_dump($state);
            $result = $state->execute(array($messageData[0], $messageData[1], $messageData[2], $messageData[3], date_default_timezone_get(), $_SERVER['REMOTE_ADDR']));
        }catch (PDOException $exception){
            echo $exception->getMessage();
        }
        var_dump($result);

    }
}