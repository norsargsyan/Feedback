<?php


namespace Core;


class View
{
    public function getTemplate($temName)
    {
        $temName = "../App/Views/template/$temName";
        if(file_exists($temName))
        {
            require_once $temName;
        }
        else{
            Router::get404();
        }


    }

}