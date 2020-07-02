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
    public function setCreationDate($creation_date)
    {
        $this->_creation_date = $creation_date;
    }
    
    //GETTERS RECUPER LES DONNEES
    public function id()
    {
        return $this->_id;
    }
    public function title()
    {
        return $this->_title;
    }
    public function content()
    {
        return $this->_content;
    }
    public function creation_date()
    {
        var_dump($this->_creation_date);
        return $this->_creation_date;
    }
}