<?php

namespace Controller;
use Model\PostManager;
use Model\CommentManager;

class AdminController
{
    public function display()
    {   //affichage des posts sur admin.php
        $this->_postManager = new PostManager();
        $posts = $this->_postManager->getPosts();
        //affichage des commentairs sur admin.php
        $this->_commentManager = new CommentManager();
        $comments = $this->_commentManager->getComments();

        require_once('../view/admin.php');
    }
}