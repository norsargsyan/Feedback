<?php

namespace App\Controllers;

use App\Models\SignModel;
use App\Views\SignView;
use Core\Controller;

class SignController extends Controller {

  public function index() {
    if (!isset($_SESSION['id'])) {
      $sign = new SignView;
      if (isset($_POST['login_button'])) {
        $username = htmlspecialchars($_POST['username']);
        $password = htmlspecialchars($_POST['password']);
        $signIn = new SignModel;
        $loginStatus = $signIn->signIn($username, $password);
        if (!$loginStatus) {
          $sign->getLogin(FALSE);
        }
        else {
          $_SESSION['id'] = $loginStatus['id'];
          $_SESSION['username'] = $loginStatus['username'];
          header('Location: /messages');
        }
      }
      else {
        $sign->getLogin();
      }
    }
    else {
      header('Location: /messages');
    }
  }

  public function signout() {
    $this->unsetSession('id');
    $this->unsetSession('username');
    header('Location: /sign');
  }

  public function unsetSession($sessionName) {
    if (isset($_SESSION[$sessionName])) {
      unset($_SESSION[$sessionName]);
    }
  }

}