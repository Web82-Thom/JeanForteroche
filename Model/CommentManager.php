<?php

namespace Model;

use Model\Comment;
use Controller\Router;
use PDO;

class CommentManager extends Database
{
    public function hydrate(array $data) 
    {
        $comment = new Comment();
        foreach($data as $key => $value)
        {
            $method = 'set'.ucfirst($key);
            if(method_exists($comment, $method))
            $comment->$method($value);
        }
        
        return $comment;
    }

    //RECUPERATION DES COMMENTAIRES PAR LE POST ID
    public function getCommentsByPostId($postId)
    {
        $req = $this->getDataBase()->prepare('SELECT id, author, comment, report, postId, DATE_FORMAT(commentDate, \'%d/%m/%Y <em>à</em> %Hh%imin\') AS commentDate FROM comments WHERE postId = ? ORDER BY commentDate DESC ');
        $req->execute(array($postId));
        $comments = [];
        while($data = $req->fetch(PDO::FETCH_ASSOC)) {
            $comments[] = $this->hydrate($data);
        }
        $req->closeCursor();
        
        return $comments;
    }

    // RECUPERATION D'UN COMMENTAIRE
    public function getComment($commentId)
    {
        $req = $this->getDataBase()->prepare('SELECT id, author, comment, report, postId, DATE_FORMAT(commentDate, \'%d/%m/%Y à %Hh%imin\') AS commentDate FROM comments WHERE id = ? ORDER BY commentDate DESC');
        $req->execute(array($commentId));
        $comments = [];
        while($data = $req->fetch(PDO::FETCH_ASSOC)) {
            $comments[] = $this->hydrate($data);
        }
        $req->closeCursor();
        
        return $comments;
    }

    //RECUPERATION DES COMMENTAIRES
    public function getComments()
    {
        $req = $this->getDataBase()->prepare('SELECT id, author, comment, report, postId, DATE_FORMAT(commentDate, \'%d/%m/%Y <em>à</em>à %Hh%imin\') AS commentDate FROM comments ORDER BY commentDate DESC /*LIMIT 5*/ ');
        $req->execute();
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
        $add = $this->getDataBase()->prepare('INSERT INTO comments(postId, author, comment, report, commentDate) VALUES(?, ?, ?, 0, NOW())');
        
        return $add->execute(array($postId, $author, $comment));
    }

    // SUPPRESSION DES COMMENTAIRES
    public function delete($commentId)
    {
        $req = $this->getDataBase()->prepare('DELETE FROM comments WHERE id= ?');
        
        return $req->execute(array($commentId));
    }

    // MODIFICATION DES COMMENTAIRES
    public function update($commentId, $author, $comment)
    {
        $req = $this->getdataBase()->prepare('UPDATE comments SET author = ?, comment = ?, commentDate = NOW() WHERE id = ? LIMIT 1');

        return $req->execute(array($author, $comment, $commentId));
    }

    // SIGNALER UN COMMENTAIRE
    public function report($commentId)
    {   
        $req = $this->getDataBase()->prepare('UPDATE comments SET report = ? WHERE id = ?');
        
        return $req->execute(array('1', $commentId));
    }

    // ENLEVER LE SIGNALEMENT
    public function unReport($commentId)
    {   
        $req = $this->getDataBase()->prepare('UPDATE comments SET report = ? WHERE id = ?');
        
        return $req->execute(array('0', $commentId));
    }
}
