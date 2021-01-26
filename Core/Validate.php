<?php

namespace Core;

abstract class Validate
{

    public function checkMessage()
    {
        $name = $_POST['fname'];
        $lname = $_POST['lname'];
        $email = $_POST['email'];
        $message = $_POST['message'];
        $errors = array();
        if(!preg_match("/^[a-z ]+$/i", $name))
        {
            array_push($errors, 'Wrong First name format');
        }
        if(!preg_match("/^[a-z ]+$/i", $lname))
        {
            array_push($errors, 'Wrong Last name format');
        }
        if(!filter_var($email, FILTER_VALIDATE_EMAIL))
        {
            array_push($errors, 'Wrong Email format');
        }
        if(strlen($message) < 10)
        {
            array_push($errors, 'Message a very short');
        }
        if(strlen($name) < 3)
        {
            array_push($errors, 'First name a very short');
        }
        if(strlen($lname) < 3)
        {
            array_push($errors, 'Last name a very short');
        }
        if(strlen($email) < 6)
        {
            array_push($errors, 'Email a very short');
        }
        if(count($errors) == 0)
        {
            return [true ,$name, $lname, $email, $message];
        }
        else
        {
            return [false, $errors];
        }


    }
}