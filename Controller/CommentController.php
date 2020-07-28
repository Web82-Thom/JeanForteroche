<?php

namespace Controller;

use Model\PostManager;
use Model\CommentManager;

class CommentController 
{
    private $_commentManager;

    public function __construct()
    {
        $this->_commentManager = new CommentManager();
    }

    // AJOUT D'UN COMMENTAIRE
    public function add($postId)
    {   
        //traitement du formulaire
        if (!empty($_POST['author']) && !empty($_POST['comment'])) {
            $add = $this->_commentManager->add($postId, $author, $comment);
            if ($postId > 0) {
                header('Location: index.php?objet=post&id=' . $postId);
            }

            throw new Exception('Impossible d\'ajouter le commentaire !');
        }
            
        header('Location: index.php?objet=post&id=' . $postId);
    }

    // SUPRESSION D'UN COMMENTAIRE
    public function delete($commentId)
    {
        //traitement du formulaire
        if (!empty($_POST['author']) && !empty($_POST['comment'])) {
            $this->_commentManager->delete($commentId);
            if ($commentId > 0) {
                header('Location: index.php?objet=admin');
            }

            throw new Exception('Impossible de supprimer le commentaire !');
        
        } 
        // affichage du formulaire pour la suppression
        $comment= $this->_commentManager->getComment($commentId);
        require_once('../view/formDeleteComment.php');
    }
}