<?php
// PERMET DE RECUPERER LES DONNEE EN PRIVER
class Post extends Model // Post est dans les parametres de public function getPosts() dans PostManager.php
{
    private $_id;
    private $_title;
    private $_content;
    private $_creation_date;

    //CONSTRUCTEUR
    public function __construct(array $data); //en parametres $data dans Model.php new obj($data);
    {
        $this->hydrate($data);
    }

    //HYDRATATION
    //revoie les diff setter pour mettres a jour les données sous conditions pour securité max
    public function hydrate(array $data) 
    {
        //parcours les données avec le foreach
        foreach($data as $key => $value)
        {
            //ucfirst pour la majuscule (on recuperer la donnée);
            $method = 'set'.ucfirst($key);
            // si elle exist
            if(method_exists($this, $method))
            //on lance la methode qui appel le setter
                $this->$method($value);
        }
    }

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

    //GETTERS RECUPER LES DONNES
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
        return $this->_creation_date;
    }
}