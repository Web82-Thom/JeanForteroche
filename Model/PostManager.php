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
        $req = $this->getDataBase()->prepare('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date FROM posts WHERE id = ?');
        $req->execute(array($postId));

        return $this->hydrate($req->fetch(PDO::FETCH_ASSOC));
    }
    
    //METHODE POUR RECUPERER LES POSTS
    public function getPosts()
    {
        $req = $this->getDataBase()->prepare(' SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date FROM posts ');
        $req->execute();
        $posts = [];
        while($data = $req->fetch(PDO::FETCH_ASSOC)) {
            $posts[] = $this->hydrate($data);
        }
        $req->closeCursor();
        
        return $posts;
    }

    // METHODE AJOUT D'UN POSTE
    public function add($title, $content)
    {
        $req = $this->getDataBase()->prepare('INSERT INTO posts (title, content, creation_date) VALUES(?, ?, NOW())');
        $req->execute(array($title, $content));

        $req = $this->getDataBase()->prepare('SELECT LAST_INSERT_ID();');
        $req->execute();
        //recupe l'element 0 du array et transforme en int
        return (int) $req->fetch()[0];
    }

    // METHODE DE MODIFICATION D'UN POST
    public function update($postId, $title, $content)
    {
        $req = $this->getDataBase()->prepare('UPDATE posts SET title = ?, content = ?, creation_date = NOW() WHERE id = ? LIMIT 1');

        return $req->execute(array($title, $content, $postId));
    }   
     
    // METHODE DE SUPPRESSION D'UN POST
    public function delete($postId)
    {   
        $req = $this->getDataBase()->prepare('DELETE FROM posts WHERE id = ?');

        return $req->execute(array($postId));
    }
}
