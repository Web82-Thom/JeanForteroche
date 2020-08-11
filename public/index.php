<?php
session_start();

use Model\Router;
//use Exception;

//CHARGEMENT AUTO DES CLASSES RECONSTRUCTION DU CHEMIN
spl_autoload_register(function($class) {
    $class = '../' . str_replace("\\", '/', $class) . '.php';
    if(file_exists($class)) {
        require_once($class);
    } else { 
        throw new \Exception($class);
    }
});

//instance de la classe $router et lance la méthode requete();
$router = new Router(); 
$router->requete();