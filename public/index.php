<?php
session_start();

use Controller\Router;

//CHARGEMENT AUTO DES CLASSES RECONSTRUCTION DU CHEMIN
spl_autoload_register(function($class) {
    $class = '../' . str_replace("\\", '/', $class) . '.php';
    if(file_exists($class)) {
        require_once($class);
    } else { 
        throw new \Exception($class);
    }
});

$router = new Router(); 
$router->requete();