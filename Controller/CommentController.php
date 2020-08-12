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
    public function add($postId, $author, $comment)
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

                $adminController = new AdminController();
                $adminController->display();
               
                require_once('../view/admin.php');
            }

            throw new Exception('Impossible de supprimer le commentaire !');
        } 
        // affichage du formulaire pour la suppression
        $comment= $this->_commentManager->getComment($commentId);

        require_once('../view/formDeleteComment.php');
    }

    // AFFICHAGE AVANT MODIFICATION D'UN COMMENTAIRE REDIRECTION SELON ADMIN OU USER
    public function update($commentId)
    {   //traitement du formulaire
        if (!empty($_POST['author']) && !empty($_POST['comment'])) {                          
            $this->_commentManager->update($commentId, $_POST['author'], $_POST['comment']);
            // redirection pour les users
            if (!isset($_SESSION['pseudo'])) { 
                $postController = new PostController();
                $postController->display($postId);

                require_once('../view/displayPost.php');

                //header('Location: index.php?objet=post&id=' . $postId);
            // redirection pour les admins
            } elseif (isset($_SESSION['pseudo'])) { 
                $adminController = new AdminController();
                $adminController->display();
                require_once('../view/admin.php');
            }
            
            throw new Exception('Impossible de modifier le commentaire !');
        } 
        // affichage du formulaire pour la modification
        $comment= $this->_commentManager->getComment($commentId);
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

                $adminController = new AdminController();
                $adminController->display();

                require_once('../view/admin.php');
            } 
        }
    }
}