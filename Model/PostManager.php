<?php

namespace Model;

use Model\Post;
use Controller\Router;
use PDO;

class PostManager extends Database
{
    //HYDRATATION
    public function hydrate(array $data) 
    {
        $post = new Post();
        foreach($data as $key => $value)
        {
            $method = 'set'.ucfirst($key);
            if(method_exists($post, $method))
            $post->$method($value);
        }

        return $post;
    }

    //METHODE POUR RECUPERER LES POSTS
    public function getPosts()
    {
        $req = $this->getDataBase()->prepare(' SELECT id, title, content, DATE_FORMAT(creationDate, \'%d/%m/%Y <em>à</em> %Hh%imin\') AS creationDate FROM posts ');
        $req->execute();
        $posts = [];
        while($data = $req->fetch(PDO::FETCH_ASSOC)) {
            $posts[] = $this->hydrate($data);
        }
        $req->closeCursor();
        
        return $posts;
    }

    //METHODE POUR RECUPERER 1 POSTS
    public function getPost($postId)
    {
        $req = $this->getDataBase()->prepare('SELECT id, title, content, DATE_FORMAT(creationDate, \'%d/%m/%Y <em>à</em> %Hh%imin\') AS creationDate FROM posts WHERE id = ?');
        $req->execute(array($postId));

        return $this->hydrate($req->fetch(PDO::FETCH_ASSOC));
    }
    
    // METHODE AJOUT D'UN POSTE
    public function add($title, $content)
    {
        $req = $this->getDataBase()->prepare('INSERT INTO posts (title, content, creationDate) VALUES(?, ?, NOW())');
        $req->execute(array($title, $content));

        $req = $this->getDataBase()->prepare('SELECT LAST_INSERT_ID();');
        $req->execute();

        return (int) $req->fetch()[0];
    }

    // METHODE DE MODIFICATION D'UN POST
    public function update($postId, $title, $content)
    {
        $req = $this->getDataBase()->prepare('UPDATE posts SET title = ?, content = ?, creationDate = NOW() WHERE id = ? LIMIT 1');

        return $req->execute(array($title, $content, $postId));
    }   
     
    // METHODE DE SUPPRESSION D'UN POST
    public function delete($postId)
    {   
        $req = $this->getDataBase()->prepare('DELETE FROM posts WHERE id = ?');

        return $req->execute(array($postId));
    }
}
