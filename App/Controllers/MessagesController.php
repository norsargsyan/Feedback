<?php


namespace App\Controllers;

class MessagesController
{
    public function __construct()
    {
        if(!isset($_SESSION['id']))
        {
            \Core\Router::get404();
        }
    }
    public function index()
    {
        $messages = new \App\Models\MessagesModel;
        $messages->getMessages();
        $view = new \App\Views\MessagesView;
        $view->getMessages($messages->messagesList);
    }
    public function read($id = null)
    {
        if(!isset($id) || $id == '' || $id == null){
            \Core\Router::get404();
        }
        else{
            $message = new \App\Models\MessagesModel;
            $messageData = $message->getRead($id);
            $view = new \App\Views\MessagesView;
            $view->getOneMessage($messageData);
        }
    }
    public function delete($id)
    {
        $model = new \App\Models\MessagesModel;
        $model->getDelete($id);
    }
    public function readed($id)
    {
        $model = new \App\Models\MessagesModel;
        $model->getReadedToggle($id);
    }
}