<?php

namespace Model;

use Model\Comment;
use Model\Router;
use PDO;

class CommentManager extends Database
{
    public function hydrate(array $data) 
    {
        $comment = new comment();
        //parcours les données avec le foreach
        foreach($data as $key => $value)
        {
            //ucfirst pour la majuscule (on recuperer la donnée);
            $method = 'set'.ucfirst($key);
            // si elle exist
            if(method_exists($comment, $method))
            //on lance la methode qui appel le setter
            $comment->$method($value);
        }

        return $comment;
    }

    public function getComments($postId)
    {
        var_dump($postId);
        $comments = $this->getDataBase()->prepare('SELECT id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date FROM comments WHERE post_id = ? ORDER BY comment_date DESC');
        $comments->execute(array($postId));
        
        return $comments;
    }
}