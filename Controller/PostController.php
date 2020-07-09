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
    // AJOUT D'UN POST
    public function add()
    {
        if (!empty($_POST['title']) && !empty($_POST['content'])) {
            $this->_postManager = new PostManager();
            $postId = $this->_postManager->add($_POST['title'], $_POST['content']);
            echo 'chapitre bien poster';
            //si postId est un nombre alors redirection sur displayPost de $postId
            //if (is_int($postId)) {
            header('Location: index.php?action=post&objet=admin');
            //}
            throw new Exception('Impossible d\'ajouter le commentaire !');
        } else {
            require_once('../view/formAddPost.php');
        }
    }
}
