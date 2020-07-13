<?php

namespace Controller;
use Model\PostManager;

class AdminController
{
    public function display()
    {   //affichage des posts sur admin.php
        $this->_postManager = new PostManager();
        $posts = $this->_postManager->getPosts();
        require_once('../view/admin.php');
    }
}