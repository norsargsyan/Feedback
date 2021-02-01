<?php


namespace App\Models;


use Core\Model;

class SignModel extends Model {

  public function signIn($username, $password) {
    $pdo = Model::dbConnect();
    $state = $pdo->prepare("SELECT * FROM `users` WHERE `username` = ? AND `password` = ? ");
    $state->execute([$username, $password]);
    $user = $state->fetch();
    if ($user) {
      return $user;
    }
    else {
      return FALSE;
    }

  }

}