<?php

namespace Controller;
use Model\PostManager;
use Model\CommentManager;
use Model\AdminManager;

class AdminController
{   
    public function display()
    {   //affichage des posts sur admin.php
        $this->_postManager = new PostManager();
        $posts = $this->_postManager->getPosts();
        //affichage des commentairs sur admin.php
        $this->_commentManager = new CommentManager();
        $comments = $this->_commentManager->getComments();
        //afichage des administrateurs
        $this->_adminManager = new adminManager();
        $admins = $this->_adminManager->getAdmins();
        require_once('../view/admin.php');
    }
    
    // TRAITEMENT DU LOGIN
    public function login()
    {   $this->_adminManager = new adminManager(); 
        if (!empty($_POST['email']) && !empty($_POST['password'])) { 
            $admins = $this->_adminManager->getAdmins();
            foreach ($admins as $admin) {
                if ($_POST['email'] == $admin->getEmail() && $_POST['password'] == $admin->getPass()) {
                    $_SESSION['pseudo'] = $admin->getPseudo();
                    $this->_adminController = new AdminController();
                    $connect = $this->_adminController->display();

                    require_once('../view/admin.php');
                } 
            };
        }
        //affichage de la page connection
        $admins = $this->_adminManager->getAdmins();

        require_once('../view/adminLogin.php');
    }
}