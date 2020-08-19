<?php

namespace Model;

use PDO;

//abstract ne peut pas etres instancier
abstract class Database
{
    private static $_dataBase;
    //CONNEXION A LA BASE DE DONNEE
    private static function setDataBase()
    {
        self::$_dataBase = new PDO('mysql:host=localhost;dbname=mydbase;charset=utf8', 'root', '');
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