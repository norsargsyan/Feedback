<?php

namespace App\Views;

class SignView extends \Core\View
{
    public function getLogin()
    {
        $this->getTemplate('authorisation.php');
    }

}