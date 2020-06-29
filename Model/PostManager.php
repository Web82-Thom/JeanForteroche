<?php

namespace Model;

use Model\Post;
use Model\Router;
use PDO;

class PostManager extends Database
{
    //METHODE POUR RECUPERER LES DONNEE
    public function list()
    {
        $req = $this->getDataBase()->prepare(' SELECT * FROM posts ORDER BY id desc LIMIT 0, 5 ');
        $req->execute();
        $posts = [];
        while($data = $req->fetch(PDO::FETCH_ASSOC)) {
            $posts[] = new Post($data);
        }
        $req->closeCursor();

        return $posts;
    }
}