<?php


namespace App\Models;


use Core\Model;
use Core\Router;

class MessagesModel extends Model {

  public static $emptyList;

  public $messagesList = [];

  public function getMessages($pageNumber, $messagePerPage) {
    $pdo = self::dbConnect();
    $leftLimit = $messagePerPage * ($pageNumber - 1);
    $state = $pdo->prepare("SELECT * FROM `message` ORDER BY `DATE` DESC LIMIT $leftLimit, $messagePerPage");
    $state->execute();

    while ($row = $state->fetch()) {
      array_push($this->messagesList, $row);
    }
    if ($state->rowCount() == 0) {
      self::$emptyList = TRUE;
    }
  }

  public function getMessagesCount() {
    $pdo = Model::dbConnect();
    $state = $pdo->prepare("SELECT * FROM `message`");
    $state->execute();
    return $state->rowCount();
  }

  public function getRead($id) {
    $pdo = Model::dbConnect();
    $state = $pdo->prepare("SELECT * FROM `message` WHERE `id` = ? ");
    $state->execute([$id]);
    $data = $state->fetch();
    if (!$data) {
      Router::get404();
    }
    else {
      $state = $pdo->prepare("UPDATE `message` SET `STATUS` = 1 WHERE `id` = ? ");
      $state->execute([$id]);
      return $data;
    }
  }

  public function getDelete($id) {
    $pdo = Model::dbConnect();
    $state = $pdo->prepare("DELETE FROM `message` WHERE `id` = ? ");
    $deleteStatus = $state->execute([$id]);
    echo $deleteStatus;
  }

  public function getReadedToggle($id) {
    $pdo = Model::dbConnect();
    $state = $pdo->prepare("SELECT `status` FROM `message` WHERE `id` = ? ");
    $state->execute([$id]);
    $status = $state->fetchColumn();
    if ($status == 0) {
      $status = 1;
    }
    else {
      $status = 0;
    }
    $state = $pdo->prepare("UPDATE `message` SET `STATUS` = ? WHERE `id` = ? ");
    $state->execute([$status, $id]);
    echo $status;
  }

}