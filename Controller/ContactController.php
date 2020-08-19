<?php

namespace Controller;

use Model\ContactManager;

class ContactController
{
    public function display()
    {
        var_dump('1 affichage');
        $contactManager = new ContactManager();
        $contactManager->sendMail();

        require_once('../view/formContact.php');
    }
}