<?php
class PostManager extends Model
{
    public function getPosts()
    {
        $this->getDataBase();
        return $this->getAll('posts', 'Post');// dans Model.php EN PARAMETRE (NOM DE LA TABLE, NOM DE OBJ) !! on crer le fichier post.php !!
    }
}