<?php

namespace App\Models;

use App\Controllers\ValidateController;
use Core\Validate;

class InsertModel extends \Core\Model
{
    public function insertMessage($messageData){
        $pdo = \Core\Model::dbConnect();
        date_default_timezone_set ('Asia/Yerevan');
        try {
            $state = $pdo->prepare("INSERT INTO `message` (`name`, `last_name`, `email`, `message`, `date`)
                    VALUES(?,?,?,?,?)");
            $statusMessage = $state->execute(array($messageData[1], $messageData[2], $messageData[3], $messageData[4], date("Y-m-d h:i:sa") ));
            if($statusMessage){
                return true;
            }
            else{
                return false;
            }

        }
        catch (PDOException $exception){
            echo $exception->getMessage();
        }
    }
}