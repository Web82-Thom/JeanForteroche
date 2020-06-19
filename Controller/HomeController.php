<?php

namespace Controller;

class HomeController
{
    private $_postManager;
    //private $_view;

    public function home()
    {
        $this->_postManager = new PostManager();
        $posts = $this->_postManager->getPosts();//permet de recuperer toutes les posts voir PostManager.php

        require_once('view/singleTicket.php');
    }

}