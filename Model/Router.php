<?php

namespace Model;

use Controller\AdminController;
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
            if (isset($_GET['objet']) || isset($_GET['action'])) {
                //$url = explode('/', filter_var($_GET['url'], FILTER_SANITIZE_URL));
                //AFFICHAGE DES BILLETS
                if ($_GET['objet'] === 'post') {
                    $postController = new PostController();
                    //AFFICHAGE D'1 POST
                    if (isset($_GET['id'])) {
                        $postController->display($_GET['id']);
                    // AJOUT D'UN POST
                    } elseif (isset($_GET['action'])) {
                        var_dump($_GET['action']);
                        $postController->add();
                    // AFFICHAGE DE TOUS LES POST
                    } else {
                        $postController->displayPosts();
                    }   
                //REDIRECTION SUR L'ADMIN
                } elseif ($_GET['objet'] === 'admin') {
                    $adminController = new AdminController();
                    $adminController->display();
                //REDIRECTION SUR L'INDEX.PHP
                } elseif ($_GET['objet'] === 'home') {
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