<?php

namespace Model;

use Controller\Router;
use PDO;

class AdminManager extends Database 
{
    public function hydrate(array $data) 
    {
        $admin = new admin();
        foreach($data as $key => $value)
        {
            $method = 'set'.ucfirst($key);
            if(method_exists($admin, $method))
            $admin->$method($value);
        }
        
        return $admin;
    }
    
    // RECUPEARATION DES ADMINISTRATEURS
    public function getAdmins()
    {
        $req = $this->getDataBase()->prepare('SELECT * FROM admins');
        $req->execute(array());
        $admins = [];
        while($data = $req->fetch(PDO::FETCH_ASSOC)) {
            $admins[] = $this->hydrate($data);
        }
        $req->closeCursor();
        
        return $admins;
    }
}
