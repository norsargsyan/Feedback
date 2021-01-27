<?php


namespace App\Views;


class ErrorView extends \Core\View
{
    public function index(){
        $this->getTemplate('error-page.php');
    }
}