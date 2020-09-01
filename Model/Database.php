<?php

namespace Model;

use PDO;

abstract class Database
{
    private static $_dataBase;

    //CONNEXION A LA BASE DE DONNEE
    private static function setDataBase()
    {
        require_once('../config/database.php');

        self::$_dataBase->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    }

    //RECUPERE LA CONNEXION A LA BASE DE DONNEE
    protected function getDataBase()
    {
        if(self::$_dataBase == null)
            $this::setDataBase();

            return self::$_dataBase;
    }
}