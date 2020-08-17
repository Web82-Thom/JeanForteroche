<?php

namespace Controller;

use Model\PostManager;
use Model\CommentManager;

class CommentController 
{
    private $_postController;
    private $_commentManager;
    private $_adminController;


    public function __construct()
    {
        $this->_postController = new PostController();
        $this->_commentManager = new CommentManager();
        $this->_adminController = new AdminController();
    }

    // AJOUT D'UN COMMENTAIRE
    public function add($postId, $author, $comment)
    {   
        //traitement du formulaire
        if (!empty($_POST['author']) && !empty($_POST['comment'])) {
            $this->_commentManager->add($postId, $author, $comment);
            if ($postId > 0) {
                header('Location: index.php?objet=post&id=' . $postId);
            }

            throw new Exception('Impossible d\'ajouter le commentaire !');
        }
            
        header('Location: index.php?objet=post&id=' . $postId);
    }

    // AFFICHAGE AVANT SUPRESSION D'UN COMMENTAIRE
    public function delete($commentId)
    {
        //traitement du formulaire
        if (!empty($_POST['author']) && !empty($_POST['comment'])) {
            $this->_commentManager->delete($commentId);
            if ($commentId >= 0) {
                $this->_adminController->display();
            }

            //throw new Exception('Impossible de supprimer le commentaire !');
        } 
        // affichage du formulaire pour la suppression
        $comments = $this->_commentManager->getComment($commentId);

        require_once('../view/formDeleteComment.php');
    }

    // AFFICHAGE AVANT MODIFICATION D'UN COMMENTAIRE REDIRECTION SELON ADMIN OU USER
    public function update($commentId, $postId)
    {   //traitement du formulaire
        if (!empty($_POST['author']) && !empty($_POST['comment'])) {                          
            $this->_commentManager->update($commentId, $_POST['author'], $_POST['comment']);
            // redirection pour les admin
            if (isset($_SESSION['pseudo'])) { 
                $this->_adminController->display();
            }  
            // redirection pour les users
            $this->_postController->display($postId);
        } 
        // affichage du formulaire pour la modification
        $comments = $this->_commentManager->getComment($commentId);

        require_once('../view/formUpdateComment.php');
    }

    // SIGNALER UN COMMENTAIRE
    public function report($commentId, $postId)
    {  
        $comments = $this->_commentManager->getComment($commentId);

        foreach ($comments as $comment) {
            $report = $comment->getReport($commentId);
            if ($report == 0) {
                $this->_commentManager->report($commentId);
                $report ++ ;
            } elseif ($report == 1) {
                echo 'déjà signaler';
            }

            header('Location: index.php?objet=post&id=' . $postId);
        }
    }

    // ENLEVER LE SIGNALEMENT
    public function unReport($commentId)
    {  
        $comments = $this->_commentManager->getComment($commentId);
        
        foreach ($comments as $comment) {
            $report = $comment->getReport($commentId);
            if ($report == 1) {
                $this->_commentManager->unReport($commentId);
                $report -- ;
                $this->_adminController->display();

                require_once('../view/admin.php');
            } 
        }
    }
}