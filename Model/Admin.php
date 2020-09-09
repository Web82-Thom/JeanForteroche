<?php

namespace Model;

// PERMET DE RECUPERER LES DONNEE EN PRIVER
class Admin  
{
    private $_id;
    private $_pseudo;
    private $_email;
    private $_pass;
    private $_first_admin;

    //SETTER
    public function setId($id)
    {
        $id = (int) $id;

        if ($id > 0) { 
            $this->_id = $id;
        }

        return $this;
    }

    public function setPseudo($pseudo)
    {
        if (is_string($pseudo)) { 
            $this->_pseudo = $pseudo;
        }

        return $this;
    }

    public function setEmail($email)
    {
        if (is_string($email)) { 
            $this->_email = $email;
        }

        return $this;
    }

    public function setPass($pass)
    {
        $this->_pass = $pass;

        return $this;
    }

    public function setFirst_admin($firstAdmin)
    {
        $this->_first_admin = $firstAdmin; 
        
        return $this;
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
        return $this->_first_admin;
    }
}