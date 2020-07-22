<?php

namespace Controller;

use Model\PostManager;
use Model\CommentManager;

class CommentController 
{
    private $_postManager;
    private $_commentManager;

    public function __construct()
    {
        $this->_postManager = new PostManager();
        $this->_commentManager = new CommentManager();
    }

    // AFFICHAGE D'UN COMMENTAIRE
    public function getComments($postId)
    {
        $getComment = $this->_commentManager->getComments($postId);
        header('Location: index.php?objet=post&id=' . $postId);
    }

    // AJOUT D'UN COMMENTAIRE
    public function addComment($postId)
    {
        if (!empty($_POST['author']) && !empty($_POST['comment'])) {
            $addComment = $this->_commentManager->addComment($postId, $author, $comment);
            //si postId est un nombre alors redirection sur l'affichage du post ajouter
            if ($postId > 0) {
                header('Location: index.php?objet=post&id=' . $postId);
            }
            throw new Exception('Impossible d\'ajouter le commentaire !');
        } else {
            header('Location: index.php?objet=post&id=' . $postId);
        }
    }
}