<?php


namespace Core;


class View
{
    public function getTemplate($temName, $status = null, $errors = null, $messageData = null, $pageInfo = null){
        $temName = "../App/Views/template/$temName";
        $data = array(
            'templateName' => $temName,
            'status' => $status,
            'errors' => $errors,
            'messageData' => $messageData,
            'pageInfo' => $pageInfo,
        );
        require_once '../vendor/autoload.php';
        $loader = new \Twig\Loader\FilesystemLoader('.././App/Views/template');
        $twig = new \Twig\Environment($loader);
        $twig->addGlobal("session", $_SESSION);


        if(file_exists($temName)){
            echo $twig->render('main_template.twig', $data);
        }
        else{
            Router::get404();
        }
    }
}