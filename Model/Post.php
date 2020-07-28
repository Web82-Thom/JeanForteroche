<?php

namespace Model;

// PERMET DE RECUPERER LES DONNEE EN PRIVER
class Post  
{
    private $_id;
    private $_title;
    private $_content;
    private $_creationDate;
   
    //SETTER
    public function setId($id)
    {
        $id = (int) $id;

        if($id > 0)
            $this->_id = $id;
    }
    public function setTitle($title)
    {
        if(is_string($title))
            $this->_title = $title;
    }
    public function setContent($content)
    {
        if(is_string($content))
            $this->_content = $content;
    }
    public function setCreationDate($creationDate)
    {
        $this->_creationDate = $creationDate;
    }
    
    //GETTERS RECUPER LES DONNEES
    public function getId()
    {
        return $this->_id;
    }
    public function getTitle()
    {
        return $this->_title;
    }
    public function getContent()
    {
        return $this->_content;
    }
    public function getCreationDate()
    {
        return $this->_creationDate;
    }
}