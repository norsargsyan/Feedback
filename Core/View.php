<?php


namespace Core;


class View
{
    public function getTemplate($temName, $status = null, $errors = null, $messageData = null, $pageInfo = null){
        $defTemplate = '../App/Views/template/main_template.php';
        $temName = "../App/Views/template/$temName";
        if(file_exists($temName)){
            require_once $defTemplate;
        }
        else{
            Router::get404();
        }
    }
}