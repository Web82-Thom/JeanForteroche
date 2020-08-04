<?php

namespace Model;

// PERMET DE RECUPERER LES DONNEE EN PRIVER
class Admin  
{
    private $_id;
    private $_pseudo;
    private $_email;
    private $_pass;
    private $_firstAdmin;

    //SETTER
    public function setId($id)
    {
        $id = (int) $id;

        if($id > 0)
            $this->_id = $id;
    }

    public function setPseudo($pseudo)
    {
        if(is_string($pseudo))
            $this->_pseudo = $pseudo;
    }

    public function setEmail($email)
    {
        if(is_string($email))
            $this->_email = $email;
    }

    public function setPass($pass)
    {
        $this->_pass = $pass;
    }

    public function setFirstAdmin($firstAdmin)
    {
        $this->_firstAdmin = $firstAdmin;    
    }
    
    //GETTERS RECUPER LES DONNEES
    public function getId()
    {
        return $this->_id;
    }

    public function getPseudo()
    {
        return $this->_pseudo;
    }

    public function getEmail()
    {
        return $this->_email;
    }

    public function getPass()
    {
        return $this->_pass;
    }

    public function getFirstAdmin()
    {
        return $this->_firstAdmin;
    }
}