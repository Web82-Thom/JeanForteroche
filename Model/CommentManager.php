<?php

namespace Model;

use Model\Comment;
use Model\Router;
use PDO;

class CommentManager extends Database
{
    public function hydrate(array $data) 
    {
        $comment = new Comment();
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

    // RECUPERATION D'UN COMMENTAIRE
    public function getComment($commentId)
    {
        $req = $this->getDataBase()->prepare('SELECT id, author, comment, DATE_FORMAT(commentDate, \'%d/%m/%Y à %Hh%imin\') AS commentDate FROM comments WHERE id = ? ORDER BY commentDate DESC');
        $req->execute(array($commentId));
        $data = $req->fetch(PDO::FETCH_ASSOC); 
        $req->closeCursor();

        return $this->hydrate($data);
    }

    //RECUPERATION LES COMMENTAIRES
    public function getComments()
    {
        $req = $this->getDataBase()->prepare('SELECT id, author, comment, DATE_FORMAT(commentDate, \'%d/%m/%Y <em>à</em>à %Hh%imin\') AS commentDate FROM comments ORDER BY commentDate DESC /*LIMIT 5*/ ');
        $req->execute();
        $comments = [];
        while($data = $req->fetch(PDO::FETCH_ASSOC)) {
            $comments[] = $this->hydrate($data);
        }
        $req->closeCursor();
        
        return $comments;
    }

    //RECUPERATION DES COMMENTAIRES PAR LE POST ID
    public function getCommentsByPostId($postId)
    {
        $req = $this->getDataBase()->prepare('SELECT id, author, comment, DATE_FORMAT(commentDate, \'%d/%m/%Y <em>à</em> %Hh%imin\') AS commentDate FROM comments WHERE post_id = ? ORDER BY commentDate DESC /*LIMIT 5*/ ');
        $req->execute(array($postId));
        $comments = [];
        while($data = $req->fetch(PDO::FETCH_ASSOC)) {
            $comments[] = $this->hydrate($data);
        }
        $req->closeCursor();
        
        return $comments;
    }

    // AJOUT DES COMMENTAIRES
    public function add($postId, $author, $comment)
    {
        $add = $this->getDataBase()->prepare('INSERT INTO comments(post_id, author, comment, commentDate) VALUES(?, ?, ?, NOW())');
        $add->execute(array($postId, $_POST['author'], $_POST['comment']));

        return $add;
    }

    // SUPPRESSION DES COMMENTAIRES
    public function delete($commentId)
    {
        $req = $this->getDataBase()->prepare('DELETE FROM comments WHERE id= ?');
        
        return $req->execute(array($commentId));
    }

    // MODIFICATION DES COMMENTAIRES
    public function update($postId, $author, $comment)
    {
        $req = $this->getdataBase()->prepare('UPDATE comments SET author = ?, comment = ?, commentDate = NOW() WHERE id = ? LIMIT 1');

        return $req->execute(array($author, $comment, $postId));
    }
}