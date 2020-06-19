<?php

use Controller\Router;
use Exception;

//CHARGEMENT AUTO DES CLASSES RECONSTRUCTION DU CHEMIN
spl_autoload_register(function($class) {
    $class = '../' . str_replace("\\", '/', $class) . '.php';
    if(file_exists($class)) {
        require_once($class);
    } else { 
        throw new Exception('Page introuvable');
    }
});

require_once('../view/home.php');

$router = new Router(); //instance de la classe router
$router->requete();//lance la méthode