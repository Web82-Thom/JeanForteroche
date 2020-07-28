<?php

namespace Controller;

use Model\PostManager;
use Model\CommentManager;

class PostController 
{
    private $_postManager;
    private $_commentManager;

    public function __construct()
    {
        $this->_postManager = new PostManager();
        $this->_commentManager = new CommentManager();
    }

    // RECUPERATION D'UN POST
    public function display($postId)
    {
        $post = $this->_postManager->getPost($postId);
        $comment = $this->_commentManager->getComment($postId);

        require_once('../view/displayPost.php');
    }

    // RECUPERATION DE TOUS LES POSTS
    public function displayPosts()
    {   
        $posts = $this->_postManager->getPosts();

        require_once('../view/displayPosts.php');
    }

    // AJOUT D'UN POST
    public function add()
    {   
        if (!empty($_POST['title']) && !empty($_POST['content'])) {
            $postId = $this->_postManager->add($_POST['title'], $_POST['content']);
            //si postId est un nombre alors redirection sur l'affichage du post ajouter
            if ($postId > 0) {
                header('Location: index.php?objet=post&id=' . $postId);
            }
            throw new Exception('Impossible d\'ajouter le post !');
        } else {
            require_once('../view/formAddPost.php');
        } 
    }

    // AFFICHAGE et MODIFICATION
    public function update($postId) 
    {
        // traitement du formulaire
        if (!empty($_POST['title']) && !empty($_POST['content'])) {
            $this->_postManager->update($postId, $_POST['title'], $_POST['content']);

            header('Location: index.php?objet=post&id=' . $postId);
        // affichage du formulaire modification
        } else {
            $post = $this->_postManager->getPost($postId);
            require_once('../view/formUpdatePost.php');;
        }
    }

    // AFFICHAGE et SUPPRESSION
    public function delete($postId)
    {
        //traitement du formulaire
        if (!empty($_POST['title']) && !empty($_POST['content'])) {
            $this->_postManager->delete($postId);

            header('Location: index.php?objet=admin');
        // affichage du formulaire modification
        } else {
            $post = $this->_postManager->getPost($postId);
            require_once('../view/formDeletePost.php');
        }
    }
}            
  