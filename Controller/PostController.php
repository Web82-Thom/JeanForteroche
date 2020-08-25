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
        $comments = $this->_commentManager->getCommentsByPostId($postId);

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
        if (isset($_SESSION['firstAdmin']) && $_SESSION['firstAdmin'] == 1 ) {
            if (!empty($_POST['title']) && !empty($_POST['content'])) {
                $postId = $this->_postManager->add($_POST['title'], $_POST['content']);
                if ($postId > 0) {
                    header('Location: index.php?objet=post&id=' . $postId);
                }

                throw new Exception('Impossible d\'ajouter le post !');
            } 
            require_once('../view/formAddPost.php');
        }
        require_once('../view/noAccess.php');
    }

    // AFFICHAGE et MODIFICATION
    public function update($postId) 
    {   
        if (isset($_SESSION['firstAdmin']) && $_SESSION['firstAdmin'] == 1 ) {
            if (!empty($_POST['title']) && !empty($_POST['content'])) {
                $this->_postManager->update($postId, $_POST['title'], $_POST['content']);

                header('Location: index.php?objet=post&id=' . $postId);
            } 
            $post = $this->_postManager->getPost($postId);

            require_once('../view/formUpdatePost.php');
        }
        require_once('../view/noAccess.php');
    }

    // AFFICHAGE et SUPPRESSION
    public function delete($postId)
    {
        if (isset($_SESSION['firstAdmin']) && $_SESSION['firstAdmin'] == 1 ) {
            if (!empty($_POST['title']) && !empty($_POST['content'])) {
                $this->_postManager->delete($postId);

                header('Location: index.php?objet=admin');
            }
            $post = $this->_postManager->getPost($postId);

            require_once('../view/formDeletePost.php');
        }
        require_once('../view/noAccess.php');
    }
}            
  