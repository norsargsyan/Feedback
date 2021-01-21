<?php

namespace App\Views;

class SignView extends \Core\View
{
    public function getLogin($status)
    {
        $this->getTemplate('authorisation.php', false);
    }

}