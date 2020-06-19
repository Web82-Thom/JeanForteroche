<?php

namespace Controller;

use Controller\HomeController;
use Controller\PostController;

class Router
{
    private $_controller;
    //private $_view;

    public function requete()
    {
        try {   
            // LE CONTROLLER EST INCLUS SELON L'ACTION DE L'UTILISATEUR
            if (isset($_GET['objet'])) {
                //$url = explode('/', filter_var($_GET['url'], FILTER_SANITIZE_URL));
                if ('post' === $_GET['objet']) {
                    $controller = new PostController();

                    // Affichage du poste
                    if ('display' === $_GET['action']) {
                        $controller->display($_GET['id']);
                    }
                }
                
                

            //PAGE D'ACCUEIL    
            } else {
                $controller = new HomeController();
                $controller->home();
            }
        }
        //GESTION DES ERREURS
        catch(Exception $e) {
            $errorMsg = $e->getMessage();
            require_once('views/Error.php');
        }
    }
}