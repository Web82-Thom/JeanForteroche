<?php

namespace Model;

use Controller\HomeController;
use Controller\PostController;

class Router extends PostController
{
    private $_postController;
    private $_homeController;

    public function requete()
    {
        try {   
            // DETERMINE L'ACTION DE L'UTILISATEUR 
            if (isset($_GET['action'])) {
                //$url = explode('/', filter_var($_GET['url'], FILTER_SANITIZE_URL));
                //AFFICHAGE DES BILLETS
                if ($_GET['action'] === 'post') {
                    $postController = new PostController();
                    //AFFICHAGE D'1 POST
                    if (isset($_GET['id'])) {
                        $postController->display($_GET['id']);
                    // AFFICHAGE DE TOUS LES POST
                    } else {
                        $postController->displayPosts();
                    }   
                //REDIRECTION SUR L'INDEX.PHP
                } elseif ($_GET['action'] === 'home') {
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