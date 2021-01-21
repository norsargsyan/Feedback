<?php


namespace App\Views;


class HomeView extends \Core\View
{

    public function index()
    {
        $this->getTemplate('feedback.php');
    }

}