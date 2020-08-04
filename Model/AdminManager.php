<?php

namespace Model;

use Model\Router;
use PDO;

class AdminManager extends Database 
{
    public function hydrate(array $data) 
    {
        $admin = new admin();
        //parcours les données avec le foreach
        foreach($data as $key => $value)
        {
            //ucfirst pour la majuscule (on recuperer la donnée);
            $method = 'set'.ucfirst($key);
            // si elle exist
            if(method_exists($admin, $method))
            //on lance la methode qui appel le setter
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
