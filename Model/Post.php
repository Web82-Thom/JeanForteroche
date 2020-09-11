<?php

namespace Model;

// PERMET DE RECUPERER LES DONNEE EN PRIVER
class Post  
{
    private $_id;
    private $_title;
    private $_content;
    private $_creation_date;
   
    //SETTER
    public function setId($id)
    {
        $id = (int) $id;

        if ($id > 0) {
            $this->_id = $id;
        }

        return $this;
    }

    public function setTitle($title)
    {
        if (is_string($title)) { 
            $this->_title = $title;
        }

        return $this;
    }

    public function setContent($content)
    {
        if (is_string($content)) { 
            $this->_content = $content;
        }

        return $this;
    }

    public function setCreation_date($creationDate)
    {
        $this->_creation_date = $creationDate;

        return $this;
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
        return $this->_creation_date;
    }
}