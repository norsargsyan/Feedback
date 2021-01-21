<?php


namespace App\Models;


class SignModel extends \Core\Model
{
    public function signIn($username, $password)
    {
        $pdo = \Core\Model::dbConnect();
        $state = $pdo->prepare("SELECT * FROM `users` WHERE `username` = ? AND `password` = ? ");
        $state->execute([$username, $password]);
        $user = $state->fetch();
        if($user)
        {
            return $user;
        }
        else
        {
            return false;
        }

    }
}