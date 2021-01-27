<?php

namespace App\Views;

class SignView extends \Core\View
{
    public function getLogin($status = true){
        $this->getTemplate('authorisation.php', $status);
    }

}