<?php
//abstract ne peut pas etres instancier
abstract class Model
{
    private static $_dataBase;
    //INSTANCIE LA CONNEXION A LA BASE DE DONNEE
    private static function setDataBase()
    (
        self::$_dataBase = new PDO('mysql:host=localhost;dbname=mydbase;charset=utf8', 'root', '');
        self::$_dataBase->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    )

    //RECUPERE LA CONNEXION A LA BASE DE DONNEE
    protected function getDataBase()
    {
        if(self::$_dataBase == null)
            $this::setDataBase();

            return self::$_dataBase;
    }

    //METHODE POUR RECUPERER LES DONNEE
    protected function getAll($table, $obj)
    {
        $var = [];
        $req = $this->getDataBase()->prepare(' SELECT * FROM ' .$table. ' ORDER BY creation_date DESC LIMIT 0, 5 ');
        $req->execute();
        while($data = $req->fetch(PDO::FETCH_ASSOC))
        {
            $var[] = new $obj($data);
        }
        return $var;
        req->closeCursor();
    }
}