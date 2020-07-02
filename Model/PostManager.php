<?php

namespace Model;

use Model\Post;
use Model\Router;
use PDO;

class PostManager extends Database
{
    //HYDRATATION
    //revoie les diff setter pour mettres a jour les données sous conditions pour securité max
    public function hydrate(array $data) 
    {
        $post = new Post();
        //parcours les données avec le foreach
        foreach($data as $key => $value)
        {
            //ucfirst pour la majuscule (on recuperer la donnée);
            $method = 'set'.ucfirst($key);
            // si elle exist
            if(method_exists($post, $method))
            //on lance la methode qui appel le setter
            $post->$method($value);
        }

        return $post;
    }
    //METHODE POUR RECUPERER 1 POSTS
    public function getPost($postId)
    {
        $req = $this->getDataBase()->prepare('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts WHERE id = ?');
        $req->execute(array($postId));

        return $this->hydrate($req->fetch(PDO::FETCH_ASSOC));
    }
    //METHODE POUR RECUPERER LES POSTS
    public function getPosts()
    {
        $req = $this->getDataBase()->prepare(' SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts ');
        $req->execute();
        $posts = [];
        while($data = $req->fetch(PDO::FETCH_ASSOC)) {
            $posts[] = $this->hydrate($data);
        }
        $req->closeCursor();
        
        return $posts;
    }
}
