<?php

namespace Controller;

use Model\PostManager;
use Model\CommentManager;
use Model\AdminManager;

class AdminController
{   
    private $_adminManager;
    private $_postManager;
    private $_commentManager;
    // TRAITEMENT DU LOGIN
    public function login()
    {   
        $this->_adminManager = new AdminManager(); 
        if (!empty($_POST['email']) && !empty($_POST['password'])) { 
            $admins = $this->_adminManager->getAdmins();
            foreach ($admins as $admin) {
                if ($_POST['email'] === $admin->getEmail() && password_verify($_POST['password'], $admin->getPass())) {
                    $_SESSION['pseudo'] = $admin->getPseudo();
                    $_SESSION['firstAdmin'] = $admin->getFirstAdmin();
                    $_SESSION['email'] = $admin->getEmail();
                    echo 'ok';
                    
                    $this->display();
                    
                   // require_once('../view/admin.php');
                } 
            };
        } elseif (isset($_SESSION['firstAdmin'])) {
            $this->display();

            require_once('../view/admin.php');
        } 
        require_once('../view/adminLogin.php');
    }

    public function destroy()
    {
        session_destroy();

        require_once('../view/adminLogin.php');
    }

    public function display()
    {   
        $this->_postManager = new PostManager();
        $posts = $this->_postManager->getPosts();
        $this->_commentManager = new CommentManager();
        $comments = $this->_commentManager->getComments();
        $this->_adminManager = new AdminManager();
        $admins = $this->_adminManager->getAdmins();
        
        require_once('../view/admin.php');
    }
}