<?php

namespace Controller;

class Router
{   
    //private $postCleanController;
    private $_commentController;
    private $_homeController;

    public function requete()
    {
        //$options = [
            //'id' => FILTER_VALIDATE_INT,
        //];
    $getClean = filter_var_array($_GET);
        $postClean = filter_var_array($_POST);
        try {   
            // DETERMINE L'ACTION DE L'UTILISATEUR 
            if (isset($getClean['objet'])) {
                //AFFICHAGE DES BILLETS
                if ($getClean['objet'] === 'post') {
                    $postController = new PostController();
                    $commentController = new CommentController();
                    if (isset($getClean['action'])) {
                        // AJOUT D'UN POST
                        if ($getClean['action'] === 'add') {
                            $postController->add();
                        // AFFICHAGE AVANT MODIF D'UN POST
                        } elseif ($getClean['action'] === 'update' && isset($getClean['id'])) { 
                            $postController->update($getClean['id']);
                        // AFFICHAGE AVANT SUPPRESSION 
                        } elseif ($getClean['action'] === 'delete' && isset($getClean['id'])) { 
                            $postController->delete($getClean['id']);
                        // AJOUT DE COMMENTAIRE
                        } elseif ($getClean['action'] === 'addComment' && isset($getClean['id'])) {
                            $commentController->add($getClean['id'], $postClean['author'], $postClean['comment']);
                        // AFFICHAGE AVANT SUPPRESSION D'UN COMMENTAIRE
                        } elseif ($getClean['action'] === 'deleteComment' && isset($getClean['id'])) {
                            $commentController->delete($getClean['id']);
                        // AFFICHAGE AVANT MODIFICATION D'UN COMMENTAIRE
                        } elseif ($getClean['action'] === 'updateComment' && isset($getClean['id'])) {
                            $commentController->update($getClean['id'], $getClean['postId']);
                        // SIGNALEMENT D'UN COMMENTAIRE
                        } elseif ($getClean['action'] === 'reportComment' && isset($getClean['id'])) {
                            $commentController->report($getClean['id'], $getClean['postId']);
                        // ENLEVER LE SIGNALEMENT D'UN COMMENTAIRE
                        } elseif ($getClean['action'] === 'unReportComment' && isset($getClean['id'])) {
                            $commentController->unReport($getClean['id']);
                        }
                    //AFFICHAGE D'1 POST ET SES COMMENTAIRES
                    } elseif (isset($getClean['id'])) {
                        $postController->display($getClean['id']);
                    // AFFICHAGE DE TOUS LES POST
                    } else {
                        $postController->displayPosts();
                    }
                //REDIRECTION SUR L'ADMIN
                } elseif ($getClean['objet'] === 'admin') {
                    $adminController = new AdminController();
                    if (isset($getClean['action'])) {
                        if ($getClean['action'] === 'login') {
                            $adminController->login();
                        } elseif ($getClean['action'] === 'destroy') { 
                            $adminController->destroy();
                        }
                    }
                    $adminController->display();
                // PAGE CONTACT
                } elseif ((isset($getClean['objet']) && ($getClean['objet'] === 'contact'))) {
                    $contactController = new ContactController;
                    $contactController->display();
                //REDIRECTION SUR L'INDEX.PHP
                } elseif (isset($getClean['objet']) && ($getClean['objet'] === 'home')) {

                    header ("Location: index.php");
                }
            //SI L'UTILISATEUR FAIT RIEN "PAGE D'ACCUEIL"
            } else {
                $homeController = new HomeController();
                $homeController->displayhome();
            }
        //GESTION DES ERREURS
        } catch(\Exception $e) {
            $errorMsg = $e->getMessage();

            require_once('../views/viewError.php');
        }
    }
} 