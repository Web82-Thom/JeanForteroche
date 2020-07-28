<?php

namespace Model;

// PERMET DE RECUPERER LES DONNEE EN PRIVER
class Comment  
{
    private $_id;
    private $_author;
    private $_comment;
    private $_commentDate;
   
    //SETTER
    public function setId($id)
    {
        $id = (int) $id;

        if($id > 0)
            $this->_id = $id;
    }

    public function setAuthor($author)
    {
        if(is_string($author))
            $this->_author = $author;
    }

    public function setComment($comment)
    {
        if(is_string($comment))
            $this->_comment = $comment;
    }

    public function setCommentDate($commentDate)
    {
        $this->_commentDate = $commentDate;
    }
    
    //GETTERS RECUPER LES DONNEES
    public function getId()
    {
        return $this->_id;
    }

    public function getAuthor()
    {
        return $this->_author;
    }

    public function getComment()
    {
        return $this->_comment;
    }

    public function getCommentDate()
    {
        return $this->_commentDate;
    }
}