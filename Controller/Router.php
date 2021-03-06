<?php

namespace Controller;

class Router
{   
    private $_postController;
    private $_commentController;
    private $_homeController;

    public function requete()
    {
        try {   
            // DETERMINE L'ACTION DE L'UTILISATEUR 
            if (isset($_GET['objet'])) {
                //AFFICHAGE DES BILLETS
                if ($_GET['objet'] === 'post') {
                    $postController = new PostController();
                    $commentController = new CommentController();
                    if (isset($_GET['action'])) {
                        // AJOUT D'UN POST
                        if ($_GET['action'] === 'add') {
                            $postController->add();
                        // AFFICHAGE AVANT MODIF D'UN POST
                        } elseif ($_GET['action'] === 'update' && isset($_GET['id'])) { 
                            $postController->update($_GET['id']);
                        // AFFICHAGE AVANT SUPPRESSION 
                        } elseif ($_GET['action'] === 'delete' && isset($_GET['id'])) { 
                            $postController->delete($_GET['id']);
                        // AJOUT DE COMMENTAIRE
                        } elseif ($_GET['action'] === 'addComment' && isset($_GET['id'])) {
                            $commentController->add($_GET['id'], $_POST['author'], $_POST['comment']);
                        // AFFICHAGE AVANT SUPPRESSION D'UN COMMENTAIRE
                        } elseif ($_GET['action'] === 'deleteComment' && isset($_GET['id'])) {
                            $commentController->delete($_GET['id']);
                        // AFFICHAGE AVANT MODIFICATION D'UN COMMENTAIRE
                        } elseif ($_GET['action'] === 'updateComment' && isset($_GET['id'])) {
                            $commentController->update($_GET['id'], $_GET['postId']);
                        // SIGNALEMENT D'UN COMMENTAIRE
                        } elseif ($_GET['action'] === 'reportComment' && isset($_GET['id'])) {
                            $commentController->report($_GET['id'], $_GET['postId']);
                        // ENLEVER LE SIGNALEMENT D'UN COMMENTAIRE
                        } elseif ($_GET['action'] === 'unReportComment' && isset($_GET['id'])) {
                            $commentController->unReport($_GET['id']);
                        }
                    //AFFICHAGE D'1 POST ET SES COMMENTAIRES
                    } elseif (isset($_GET['id'])) {
                        $postController->display($_GET['id']);
                    // AFFICHAGE DE TOUS LES POST
                    } else {
                        $postController->displayPosts();
                    }
                //REDIRECTION SUR L'ADMIN
                } elseif ($_GET['objet'] === 'admin') {
                    $adminController = new AdminController;
                    if (isset($_GET['action'])) {
                        if ($_GET['action'] === 'login') {
                            $adminController->login();
                        } elseif ($_GET['action'] === 'destroy') { 
                            $adminController->destroy();
                        }
                    }
                    $adminController->display();
                // PAGE CONTACT
                } elseif ((isset($_GET['objet']) && ($_GET['objet'] === 'contact'))) {
                    $contactController = new ContactController;
                    $contactController->display();
                //REDIRECTION SUR L'INDEX.PHP
                } elseif (isset($_GET['objet']) && ($_GET['objet'] === 'home')) {

                    header ("Location: index.php");
                }
            //SI L'UTILISATEUR FAIT RIEN "PAGE D'ACCUEIL"
            } else {
                $homeController = new HomeController();
                $homeController->displayhome();
            }
        //GESTION DES ERREURS
        } catch(Exception $e) {
            $errorMsg = $e->getMessage();

            require_once('../views/viewError.php');
        }
    }
} 