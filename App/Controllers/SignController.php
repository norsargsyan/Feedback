<?php

namespace App\Controllers;

class SignController
{
    public function index()
    {
        
        $sign = new \App\Views\SignView;
        $sign->getLogin();
    }

}