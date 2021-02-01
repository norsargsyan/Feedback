<?php


namespace App\Controllers;

use App\Models\MessagesModel;
use App\Views\MessagesView;
use Core\Controller;
use Core\Router;

class MessagesController extends Controller {

  public function __construct() {
    if (!isset($_SESSION['id'])) {
      Router::get404();
    }
  }

  public function index() {
    $this->page(1);
  }

  public function page($pageNumber = NULL) {
    if ($pageNumber == NULL || !preg_match("/^[0-9 ]+$/i", $pageNumber)) {
      Router::get404();
    }
    else {
      $messages = new MessagesModel;
      $messageCount = $messages->getMessagesCount();
      $messages->getMessages($pageNumber, $this->messagePerPage);
      $pageCount = $this->paginationStatus($messageCount);
      if($pageCount < $pageNumber || $pageNumber == 0) {
        Router::get404();
      }
      $view = new MessagesView;
      $pageInfo = [
        'page-count' => $pageCount,
        'current-page' => $pageNumber,
      ];
      $view->getMessages($messages->messagesList, $pageInfo);
    }
  }

  public function paginationStatus($messageList) {
    return ceil($messageList / $this->messagePerPage);
  }

  public function read($id = NULL) {
    if (!isset($id) || $id == '' || $id == NULL) {
      Router::get404();
    }
    else {
      $message = new MessagesModel;
      $messageData = $message->getRead($id);
      $view = new MessagesView;
      $view->getOneMessage($messageData);
    }
  }

  public function delete($id) {
    $model = new MessagesModel;
    $model->getDelete($id);
  }

  public function readed($id) {
    $model = new MessagesModel;
    $model->getReadedToggle($id);
  }

}