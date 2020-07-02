<?php

namespace Controller;

use Model\PostManager;

class PostController
{
    private $_postManager;
    //private $_view;
    // RECUPERATION D'UN POST
    public function display($postId)
    {
        $this->_postManager = new PostManager();

        $post = $this->_postManager->getPost($postId);

        require_once('../view/displayPost.php');
    }
    // RECUPERATION DE TOUS LES POSTS
    public function displayPosts()
    {   
        $this->_postManager = new PostManager();

        $posts = $this->_postManager->getPosts();

        require_once('../view/displayPosts.php');
    }

}

