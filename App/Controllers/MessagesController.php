<?php


namespace App\Controllers;

class MessagesController extends \Core\Controller
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
        $this->page(1);
    }

    public function paginationStatus($messageList)
    {
        return ceil($messageList / $this->messagePerPage);
    }

    public function page($pageNumber = null)
    {
        if($pageNumber == null)
        {
            \Core\Router::get404();
        }
        else {
            $messages = new \App\Models\MessagesModel;
            $messages->getMessages($pageNumber, $this->messagePerPage);
            $pageCount = $this->paginationStatus($messages->getMessagesCount());
            $view = new \App\Views\MessagesView;
            $pageInfo = array(
                'page-count' => $pageCount,
                'current-page' => $pageNumber,
            );
            $view->getMessages($messages->messagesList, $pageInfo);
        }
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