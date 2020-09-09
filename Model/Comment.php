<?php

namespace Model;

// PERMET DE RECUPERER LES DONNEE EN PRIVER
class Comment  
{
    private $_id;
    private $_post_id;
    private $_author;
    private $_comment;
    private $_comment_date;
    private $_report;
   
    //SETTER
    public function setId($id)
    {
        $id = (int) $id;

        if ($id > 0) {
            $this->_id = $id;
        }

        return $this;
    }

    public function setPost_id($postId)
    {
        $postId = (int) $postId;

        if ($postId > 0) {
            $this->_post_id = $postId;
        }

        return $this;
    }

    public function setAuthor($author)
    {
        if (is_string($author)) { 
            $this->_author = $author;
        }

        return $this;
    }

    public function setComment($comment)
    {
        if (is_string($comment)) { 
            $this->_comment = $comment;
        }

        return $this;
    }

    public function setComment_date($commentDate)
    {
        $this->_comment_date = $commentDate;

        return $this;
    }

    public function setReport($report)
    {
        $report = (int) $report;

        if ($report >= 0) { 
            $this->_report = $report;
        }

        return $this;
    }
    
    //GETTERS RECUPER LES DONNEES
    public function getId()
    {
        return $this->_id;
    }

    public function getPostId()
    {
        return $this->_post_id;
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
        return $this->_comment_date;
    }

    public function getReport()
    {
        return $this->_report;
    }
}