<?php


namespace App\Views;


class HomeView extends \Core\View
{

    public function __construct()
    {
        $this->getTemplate('feedback.html');
    }
    public function index()
    {
    }

}