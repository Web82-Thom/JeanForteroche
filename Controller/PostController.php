<?php

namespace Controller;

use Model\PostManager;

class PostController 
{
    private $_postManager;
    
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
            //si postId est un nombre alors redirection sur l'affichage du post ajouter
            if ($postId > 0) {
                header('Location: index.php?objet=post&id=' . $postId);
            }
            throw new Exception('Impossible d\'ajouter le post !');
        } else {
            require_once('../view/formAddPost.php');
        } 
    }

    // AFFICAHGE AVANT MODIFICATION UN POST
    public function update($postId) 
    {
        $this->_postManager = new PostManager();
        $post = $this->_postManager->getPost($postId);
        require_once('../view/formUpdatePost.php');
    }

    // MODIFICATION UN POST
    public function updated($postId, $title, $content) 
    {
        $this->_postManager = new PostManager();

        $post = $this->_postManager->updated($postId, $title, $content);

        $this->_postManager = new PostManager();

        $post = $this->_postManager->getPost($postId);

        require_once('../view/displayPost.php');
    }

    // AFFICHAGE AVANT SUPPRESSION D'UN POST
    public function delete($postId)
    {
        $this->_postManager = new PostManager();
        $post = $this->_postManager->getPost($postId);
        require_once('../view/deletePost.php');
    }

    // SUPPRESSION
    public function deleted($postId)
    {
        $this->_postManager = new PostManager();
        $post = $this->_postManager->delete($postId);
        header('Location: index.php?objet=admin');
    
    }
     /*$this->_postManager = new PostManager();
        traitement du formulaire
        if (!empty($_POST['title']) && !empty($_POST['content'])) {
           $post = $this->_postManager->updated($postId, $title, $content);
            //si postId est un nombre alors redirection sur l'affichage du post modifier
            if ($postId >= 0) {
                require_once('../view/admin.php');
            }
            throw new Exception('Impossible de modifier le post !');
        // affichage du formulaire modification
        } else {
            var_dump('else');
            $post = $this->_postManager->getPost($postId);
        require_once('../view/formUpdatePost.php');;
        } */
}            
  