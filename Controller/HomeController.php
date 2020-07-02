<?php

namespace Controller;

use Model\PostManager;

class HomeController
{
    public function displayHome()
    {   
        require_once('../view/home.php');
    }
}