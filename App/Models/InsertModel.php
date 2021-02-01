<?php

namespace App\Models;

use Core\Model;

class InsertModel extends Model {

  public function insertMessage($messageData) {
    $pdo = Model::dbConnect();
    date_default_timezone_set('Asia/Yerevan');
    try {
      $state = $pdo->prepare("INSERT INTO `message` (`name`, `last_name`, `email`, `message`, `date`)
                    VALUES(?,?,?,?,?)");
      $statusMessage = $state->execute([
        $messageData[1],
        $messageData[2],
        $messageData[3],
        $messageData[4],
        date("Y-m-d h:i:sa"),
      ]);
      if ($statusMessage) {
        return TRUE;
      }
      else {
        return FALSE;
      }

    } catch (PDOException $exception) {
      echo $exception->getMessage();
    }
  }

}