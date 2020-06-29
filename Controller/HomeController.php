<?php

namespace Controller;

use Model\PostManager;

class HomeController
{
    private $_postManager;

    public function displayHome()
    {   
        $this->_postManager = new PostManager();
        $posts = $this->_postManager->list();
        require_once('../view/home.php');
    }
}