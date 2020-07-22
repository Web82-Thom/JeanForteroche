<?php

namespace Model;

use Controller\AdminController;
use Controller\HomeController;
use Controller\PostController;
use Controller\CommentController;

class Router extends PostController
{
    private $_postController;
    private $_commentController;
    private $_homeController;

    public function requete()
    {
        try {   
            // DETERMINE L'ACTION DE L'UTILISATEUR 
            if (isset($_GET['objet'])) {
                //$url = explode('/', filter_var($_GET['url'], FILTER_SANITIZE_URL));
                //AFFICHAGE DES BILLETS
                if ($_GET['objet'] === 'post') {
                    $postController = new PostController();
                    if (isset($_GET['action'])) {
                        // AJOUT D'UN POST
                        if ($_GET['action'] === 'add') {
                            $postController->add();
                        // AFFICHAGE AVANT MODIF D'UN POST
                        } elseif ($_GET['action'] === 'update' && isset($_GET['id'])) { 
                            $postController->update($_GET['id']);
                        // AFFICHAGE AVANT suppression 
                        } elseif ($_GET['action'] === 'delete' && isset($_GET['id'])) { 
                            $postController->delete($_GET['id']);
                        // AJOUT DE COMMENTAIRE
                        } elseif ($_GET['action'] === 'addComment' && isset($_GET['id'])) {
                            $commentController = new CommentController();
                            $commentController->addComment($_GET['id'], $_POST['author'], $_POST['comment']);
                        }
                    //AFFICHAGE D'1 POST
                    } elseif (isset($_GET['id'])) {
                        $postController->display($_GET['id']);
                    // AFFICHAGE DE TOUS LES POST
                    } else {
                    $postController->displayPosts();
                    }
                //REDIRECTION SUR L'ADMIN
                } elseif ($_GET['objet'] === 'admin') {
                    $adminController = new AdminController();
                    $adminController->display();
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