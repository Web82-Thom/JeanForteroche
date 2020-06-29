<?php

namespace Controller;

use Model\PostManager;

class PostController
{
    private $_postManager;
    //private $_view;

    public function display()
    {
        try {
            if (isset($_GET['action'])) {
                if ($_GET['objet'] == 'home') {
                    var_dump('($_GET['"action"'] == home) de display();');
                    display();
                }d
                elseif ($_GET['action'] == 'post') {
                    if (isset($_GET['id']) && $_GET['id'] > 0) {
                        list();
                    }
                    else {
                        throw new Exception('Aucun identifiant de billet envoyé');
                    }
                }
            }
            else {
                display();
            }
        }
        catch(Exception $e) {
            echo 'Erreur : ' . $e->getMessage();
        }
    }

    public function list()
    {   var_dump('list');
        $postManager = new PostManager();
        $posts = $postManager->list();
        
        include('../view/singleTicket.php');
    }
}

