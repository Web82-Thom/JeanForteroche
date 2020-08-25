<?php

namespace Controller;

use Model\ContactManager;

class ContactController
{
    public function display()
    {
        $contactManager = new ContactManager();
        $contactManager->sendMail();

        require_once('../view/formContact.php');
    }
}