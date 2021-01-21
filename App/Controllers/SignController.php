<?php

namespace App\Controllers;

class SignController
{
    public function index()
    {
        $sign = new \App\Views\SignView;
        if(isset($_POST['login_button']))
        {
            $username = htmlspecialchars($_POST['username']);
            $password = htmlspecialchars($_POST['password']);
            $signIn = new \App\Models\SignModel;
            $loginStatus = $signIn->signIn($username, $password);
            if(!$loginStatus){
                $sign->getLogin(false);
            }
        }
        else {
            $sign->getLogin();
        }
    }

}