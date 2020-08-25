<?php

namespace Controller;

use Model\PostManager;
use Model\CommentManager;

class CommentController 
{
    private $_commentManager;
    private $_adminController;

    public function __construct()
    {
        $this->_commentManager = new CommentManager();
        $this->_adminController = new AdminController();
    }

    // AJOUT D'UN COMMENTAIRE
    public function add($postId, $author, $comment)
    {   
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
    {   if (isset($_SESSION['firstAdmin']) && $_SESSION['firstAdmin'] == 1 ) {
            if ($commentId >= 0 && !empty($_POST['author']) && !empty($_POST['comment'])) {
                $this->_commentManager->delete($commentId);
                if ($commentId > 0) {
                    header('Location: index.php?objet=admin');
                }

                throw new Exception('Impossible d\'ajouter le commentaire !');
            }
            $comments = $this->_commentManager->getComment($commentId);

            require_once('../view/formDeleteComment.php');
        }

        require_once('../view/noAccess.php');
    }

    // AFFICHAGE AVANT MODIFICATION D'UN COMMENTAIRE
    public function update($commentId, $postId)
    {
        if (isset($_SESSION['firstAdmin']) && $_SESSION['firstAdmin'] == 1 ) {
            var_dump($_SESSION['firstAdmin']);
            if (!empty($_POST['author']) && !empty($_POST['comment']) && isset($_SESSION['pseudo'])) {                          
                $this->_commentManager->update($commentId, $_POST['author'], $_POST['comment']);
                
                header('Location: index.php?objet=post&id=' . $postId);
            } 
            $comments = $this->_commentManager->getComment($commentId);

            require_once('../view/formUpdateComment.php');
        }   
        
        require_once('../view/noAccess.php');
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
        if (isset($_SESSION['firstAdmin']) && $_SESSION['firstAdmin'] == 1 ) {
            $comments = $this->_commentManager->getComment($commentId);
            foreach ($comments as $comment) {
                $report = $comment->getReport($commentId);
                if ($report == 1) {
                    $this->_commentManager->unReport($commentId);
                    $report -- ;

                    header('Location: index.php?objet=admin');
                } 
            }
        }

        require_once('../view/noAccess.php');
    }
}